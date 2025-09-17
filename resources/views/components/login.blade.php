@extends('Layout.app')
@section('content')

{{-- <form method="POST"> --}}
  <img src="https://leetcode.com/static/images/LeetCode_logo_rvs.png" alt="Logo" class="logo">
  <h4 class="mb-3">Sign In</h4>
    <div class="mb-3 text-start">
      <label class="form-label" for="email">Email address</label>
      <input type="email" class="form-control" id="email" placeholder="name@example.com">
    </div>
    <div class="mb-3 text-start">
      <label class="form-label" for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Your password">
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="remember">
        <label class="form-check-label" for="remember">Remember me</label>
      </div>
      <a href="reset.html" class="small">Forgot password?</a>
    </div>
    <button onclick="SubmitLogin()" class="btn btn-warning w-100">Sign In</button>
    <div class="mt-3">
      <span class="text-muted small">Don’t have an account?</span>
      <a href="{{ route('registation') }}" class="text-decoration-none">Sign Up</a>
    </div>
  {{-- </form> --}}
  <script>
    async function SubmitLogin() {
      let email = document.getElementById('email').value;
      let password = document.getElementById('password').value;

      if(email.length == 0){
        toastr.error('Email is required');
      } else if(password.length == 0){
        toastr.error('Password is required');
      } else{
        let val = await axios.post('/user-login', {
          email: email,
          password: password
        });
        if(val.status ==  200 && val.data['status'] == 'success'){
          window.location.href = "/dashboard";
          toastr.success(val.data['message']);
        } else{
          toastr.error(val.data['message']);
        }
      }
    }
  </script>
@endsection