<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DLC Code | ลงชื่อเข้าใช้</title>
    <link rel="icon" href="{{url('')}}/public/images/dlc.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="{{url('')}}/public/css/login/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
        <h2 class="menu-data">
            <span style="position: absolute;"></span><span>DL</span><span>C &nbsp;</span><span style="color: #21BDA1;">C</span><span>ode</span>
            <br>
            <i></i>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row m-0 mt-5">
                    <div class="col-xl-4"></div>
                    <div class="col-xl-4">
                        <x-jet-input id="email" class="form-control" type="text" name="email" :value="old('email')" required autofocus placeholder="Email or Username"/>
                    </div>
                    <div class="col-xl-4"></div>
                </div>
                <div class="row m-0 mt-2">
                    <div class="col-xl-4"></div>
                    <div class="col-xl-4">
                        <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Password"/>
                    </div>
                    <div class="col-xl-4"></div>
                </div>
                <div class="row m-0">
                    <div class="col-xl-4"></div>
                    <div class="col-xl-4 text-right">
                        <a href="{{url('register')}}"><small>Register</small></a>&emsp;
                    </div>
                    <div class="col-xl-4"></div>
                </div>
                <div class="row m-0 mt-3">
                    <div class="col-xl-4"></div>
                    <div class="col-xl-4">
                        <button class="btn-bs w-100">Login</button>
                    </div>
                    <div class="col-xl-4"></div>
                </div>

            </form>
        </h2>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
