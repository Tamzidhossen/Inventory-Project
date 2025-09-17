<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>sqrEloquent – Website Created</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <style>
    body { background-color:#f5f6f7; }
    .auth-container {
      max-width: 420px; margin: 80px auto;
      background:#fff; padding:2rem;
      border-radius:.75rem; box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
    }
    .otp-inputs input {
      width: 3rem;
      height: 3rem;
      text-align: center;
      font-size: 1.25rem;
      margin: 0 .25rem;
    }
    .logo { width:60px; margin-bottom:1rem; }
  </style>
</head>
<body>

<div class="auth-container text-center">

    @yield('content')
    
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>
</html>
