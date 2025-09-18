@extends('Layout.app')
@section('content')
  <!-- You can put your logo here -->
  <img src="https://leetcode.com/static/images/LeetCode_logo_rvs.png" alt="Logo" class="logo">

  <h4 class="mb-3">Reset Your Password</h4>
  <p class="text-muted small mb-4">
    Enter your email address and we’ll send you instructions to reset your password.
  </p>

  {{-- <form> --}}
    <div class="mb-3 text-start">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" placeholder="name@example.com">
    </div>
    <button type="submit" onclick="SentOTP()" class="btn btn-warning w-100">
      Send Reset Link
    </button>
  {{-- </form> --}}

  <div class="mt-3">
    <a href="{{ route('login') }}" class="text-decoration-none">Back to Sign In</a>
  </div>
  <script>
    async function SentOTP() {
      let email = document.getElementById('email').value;

      if(email.length == 0){
        toastr.error('Email is required');
      } else {
        let val = await axios.post('/send-otp-code', { email: email });
        if(val.status ==  200 && val.data['status'] == 'success'){
          toastr.success(val.data['message']);
          sessionStorage.setItem('email', email);
          setTimeout(() => {
            window.location.href = "/verify-otp";
          }, 2000);
        }else{
          toastr.error('User Email is not found');
        }
      }
    }
  </script>
@endsection