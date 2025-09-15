@extends('layout.app')
@section('content')
  <img src="https://leetcode.com/static/images/LeetCode_logo_rvs.png" alt="Logo" class="logo">
  <h4 class="mb-3">Create an Account</h4>
  <form>
    <div class="mb-3 text-start">
      <label class="form-label" for="name">Full Name</label>
      <input type="text" class="form-control" id="name" placeholder="John Doe" required>
    </div>
    <div class="mb-3 text-start">
      <label class="form-label" for="email">Email address</label>
      <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
    </div>
    <div class="mb-3 text-start">
      <label class="form-label" for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Create a password" required>
    </div>
    <div class="mb-3 text-start">
      <label class="form-label" for="confirm_password">Confirm Password</label>
      <input type="password" class="form-control" id="confirm_password" placeholder="Re-enter password" required>
    </div>
    <button type="submit" class="btn btn-warning w-100">Sign Up</button>
  </form>

  <div class="mt-3">
    <span class="text-muted small">Already have an account?</span>
    <a href="{{ route('login') }}" class="text-decoration-none">Sign In</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection