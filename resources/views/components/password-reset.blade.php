@extends('Layout.app')
@section('content')
  <img src="https://leetcode.com/static/images/LeetCode_logo_rvs.png" alt="Logo" class="logo">
  <h4 class="mb-3">Update Your Password</h4>
  <form>
    <div class="mb-3 text-start">
      <label class="form-label" for="email">New Password</label>
      <input type="password" class="form-control" id="password" placeholder="........" required>
    </div>
    <div class="mb-3 text-start">
      <label class="form-label" for="password">Confirm Password</label>
      <input type="password" class="form-control" id="password_confirmation" placeholder="........" required>
    </div>
    <button type="submit" class="btn btn-warning w-100">Update Password</button>
  </form>
@endsection