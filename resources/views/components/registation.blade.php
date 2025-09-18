@extends('layout.app')
@section('content')
  <img src="https://leetcode.com/static/images/LeetCode_logo_rvs.png" alt="Logo" class="logo">
  <h4 class="mb-3">Create an Account</h4>
  {{-- <form> --}}
    <div class="mb-3 text-start">
      <label class="form-label" for="name">First Name</label>
      <input type="text" class="form-control" id="firstName" placeholder="John">
    </div>
    <div class="mb-3 text-start">
      <label class="form-label" for="name">Last Name</label>
      <input type="text" class="form-control" id="lastName" placeholder="Doe">
    </div>
    <div class="mb-3 text-start">
      <label class="form-label" for="email">Email address</label>
      <input type="email" class="form-control" id="email" placeholder="name@example.com">
    </div>
    <div class="mb-3 text-start">
      <label class="form-label" for="mobile">Mobile</label>
      <input type="number" class="form-control" id="mobile" placeholder="Mobile Number">
    </div>
    <div class="mb-3 text-start">
      <label class="form-label" for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Create a password">
    </div>
    <button type="submit" onclick="SubmitRegistation()" class="btn btn-warning w-100">Sign Up</button>
  {{-- </form> --}}

  <div class="mt-3">
    <span class="text-muted small">Already have an account?</span>
    <a href="{{ route('login') }}" class="text-decoration-none">Sign In</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  async function SubmitRegistation() {
    let firstName = document.getElementById('firstName').value;
    let lastName = document.getElementById('lastName').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let mobile = document.getElementById('mobile').value;

    if(firstName.length == 0){
      toastr.error('First Name is required');
    } else if(lastName.length == 0){
      toastr.error('Last Name is required');
    } else if(email.length == 0){
      toastr.error('Email is required');
    } else if(password.length == 0){
      toastr.error('Password is required');
    } else if(mobile.length == 0){
      toastr.error('Mobile is required');
    } else {
      let val = await axios.post('/user-registation', { firstName: firstName, lastName: lastName, email: email, password: password, mobile: mobile });
      if(val.status ==  200 && val.data['status'] == 'success'){
        toastr.success(val.data['message']);
        setTimeout(() => {
          window.location.href = "/login";
        }, 2000);
      }else{
        toastr.error('Registation failed');
      }
    }
  }
</script>
</body>
</html>
@endsection