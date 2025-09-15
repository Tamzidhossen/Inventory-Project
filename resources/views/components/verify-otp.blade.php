@extends('Layout.app')
@section('content')
  <!-- Optional Logo -->
  <img src="https://leetcode.com/static/images/LeetCode_logo_rvs.png" alt="Logo" class="logo">

  <h4 class="mb-3">Enter OTP</h4>
  <p class="text-muted small mb-4">
    We’ve sent a 6-digit verification code to your email address.
  </p>

  <form>
    <div class="otp-inputs d-flex justify-content-center mb-3">
      <input type="text" maxlength="1" class="form-control" required>
      <input type="text" maxlength="1" class="form-control" required>
      <input type="text" maxlength="1" class="form-control" required>
      <input type="text" maxlength="1" class="form-control" required>
      <input type="text" maxlength="1" class="form-control" required>
      <input type="text" maxlength="1" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-warning w-100">
      Verify OTP
    </button>
  </form>

  <div class="mt-3">
    <span class="text-muted small">Didn’t get the code?</span>
    <a href="#" class="text-decoration-none">Resend</a>
  </div>
@endsection