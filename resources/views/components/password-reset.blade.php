@extends('Layout.app')
@section('content')
  <img src="https://leetcode.com/static/images/LeetCode_logo_rvs.png" alt="Logo" class="logo">
  <h4 class="mb-3">Update Your Password</h4>
  {{-- <form> --}}
    <div class="mb-3 text-start">
      <label class="form-label" for="email">New Password</label>
      <input type="password" class="form-control" id="password" placeholder="Enter New Password">
    </div>
    <div class="mb-3 text-start">
      <label class="form-label" for="password">Confirm Password</label>
      <input type="password" class="form-control" id="password_confirmation" placeholder="Confirmed New Password">
    </div>
    <button onclick="ResetPass()" class="btn btn-warning w-100">Update Password</button>
  {{-- </form> --}}

  <script>
    async function ResetPass() {
      let password = document.getElementById('password').value;
      let confrm_pass = document.getElementById('password_confirmation').value;
      // console.log(password, confrm_pass);

      if(password.length == 0) {
        toastr.error('Password is required');
      } else if(confrm_pass.length == 0) {
        toastr.error('Confirm Password is required');
      } else if(password != confrm_pass) {
        toastr.error('Password & Confirm Password Not Mached');
      } else {
        let val = await axios.post('/reset-password', {password: password});
        if(val.status == 200 && val.data['status'] == 'success') {
          toastr.success(val.data['message']);
          // debugger;
          setTimeout(() => {
            window.location.href = '/login';
          }, 2000);
        } else {
          toastr.error(val.data['message']);
        }
      }
    }
  </script>
@endsection