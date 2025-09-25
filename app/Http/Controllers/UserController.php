<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Mail\OTPMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    function abc() {
        return view('backend.addcategory');
    }
    public function Dashboard(){
        return view('Layout.dashboard');
    }

    public function Registation(){
        return view('components.registation');
    }
    public function Login(){
        return view('components.login');
    }
    public function SentOTP(){
        return view('components.sent-otp');
    }
    public function VerificationCode(){
        return view('components.verify-otp');
    }
    public function PasswordReset(){
        return view('components.password-reset');
    }
    
    public function UserRegistation(Request $request) {
        try {
            $user = User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' => $request->input('password'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'User Registation Successful',
                'user' => $user     //Optional
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'Error',
                'message' => 'User Registation Faild',
            ]);
        }
    }

    public function UserLogin(Request $request) {
        $user = User::where('email', $request->input('email'))->first();
        // return $user;

        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Password & Email is correct
            $token = JWTToken::CreateToken($request->input('email'));
            return response()->json([
                'status' => 'success',
                'message' => 'User Login Successful',
                // 'token' => $token
            ], 200)->cookie('token', $token, 60*24*30);
            // return 1;
        } else {
            // Invalid credentials
            return response()->json([
                'status' => 'error',
                'message' => 'User Login Faild',
            ], 200);
            // return 0;
        }
    }
    
    public function SendOTPCode(Request $request) {
        $email = $request->input('email');
        $otp = rand(1000, 9999);
        $cnt = User::where('email', $email)->count();
    
        if($cnt==1) {
            // OTP Form User Address
            Mail::to($email)->send(new OTPMail($otp));
            // OTP Cod Table  Update
            User::where('email', $email)->update(['otp' => $otp]);
    
            return response()->json([
                'status' => 'success',
                'message' => '4 Digit OTP Send Your Email Address',
            ], 200);
        } else {
            return response()->json([
                'status' => 'Error',
                'message' => 'Email Not Found',
            ], 200);
        }
    }

    public function VerifyOTP(Request $request) {
        $email = $request->input('email');
        $otp = $request->input('otp');
        $cnt = User::where('email', $email)->where('otp', $otp)->count();
    
        if($cnt==1) {
            // OTP Code Update
            User::where('email', $email)->update(['otp' => '0']);

            //Password Reset Token
            $token = JWTToken::CreateTokenForSetFassword($request->input('email'));
    
            return response()->json([
                'status' => 'success',
                'message' => 'OTP Verify Successful',
                'token' => $token
            ], 200);
        } else {
            return response()->json([
                'status' => 'Error',
                'message' => 'Invalid OTP Code',
            ], 200);
        }
    }

    public function ResetPassword(Request $request) {
        try{
            $email = $request->header('email');
            $password = $request->input('password');
            User::where('email', $email)->update(['password' => bcrypt($password)]);
            return response()->json([
                'status' => 'success',
                'message' => 'Password Reset Successful',
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Password Reset Faild',
            ], 200);
        }
    }
}
