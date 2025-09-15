@extends('Layout.app')
@section('content')
  <!-- You can put your logo here -->
  <img src="https://leetcode.com/static/images/LeetCode_logo_rvs.png" alt="Logo" class="logo">

  <h4 class="mb-3">Reset Your Password</h4>
  <p class="text-muted small mb-4">
    Enter your email address and we’ll send you instructions to reset your password.
  </p>

  <form>
    <div class="mb-3 text-start">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
    </div>
    <button type="submit" class="btn btn-warning w-100">
      Send Reset Link
    </button>
  </form>

  <div class="mt-3">
    <a href="login.html" class="text-decoration-none">Back to Sign In</a>
  </div>
</div>
@endsection