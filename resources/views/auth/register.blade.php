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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .alert-text{font-size: 12px !important;display: block;letter-spacing:none !important;}
    </style>
</head>
<body>
        <h2 class="menu-data">
            <span style="position: absolute;"></span><span>DL</span><span>C &nbsp;</span><span style="color: #21BDA1;">C</span><span>ode</span>
            <br>
            <i>Register</i>

            <form method="POST" action="{{ url('users') }}">
                @csrf
                <div class="row m-0 mt-5">
                    <div class="col-xl-4"></div>
                    <div class="col-xl-4">
                        <x-jet-input id="name" class="form-control" type="text" name="name" required autofocus placeholder="Name"/>
                    </div>
                    <div class="col-xl-4"></div>
                </div>
                <div class="row m-0 mt-2">
                    <div class="col-xl-4"></div>
                    <div class="col-xl-4">
                        <x-jet-input id="email" class="form-control" type="text" name="email" required placeholder="Email or Username"/>
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
                    <div class="col-xl-4 pt-1">
                        <font id="check_user"></font>
                    </div>
                    <div class="col-xl-4"></div>
                </div>
                <div class="row m-0 mt-3">
                    <div class="col-xl-4"></div>
                    <div class="col-xl-4">
                        <button type="submit" id="btn_submit" class="btn-bs w-100" disabled>Register</button>
                    </div>
                    <div class="col-xl-4"></div>
                </div>

            </form>
        </h2>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="{{url('')}}/public/js/jquery-3.5.1.min.js"></script>
<script>
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    $("#email").keyup(function(){
        var this_mail = $(this).val()
        if(this_mail.length>4){
            $.post("{{url('ajax')}}",
                {
                    event    : 'check_user',
                    email    : this_mail,
                },
                function(data, status) {
                    if(data==99){
                        $("#check_user").html('<font class="alert-text text-danger">Email หรือ Username นี้มีในระบบแล้ว</font>')
                        $("#btn_submit").attr('disabled',true);
                    }else{
                        $("#check_user").html('<font class="alert-text text-success">Email หรือ Username สามารถใช้ได้</font>')
                        $("#btn_submit").attr('disabled',false);
                    }
                })
        }else{
            $("#check_user").html('<font class="alert-text text-danger">Email หรือ Username ต้องมากกว่า 4 ตัวอักษร</font>')
            $("#btn_submit").attr('disabled',true);
        }
    })
</script>
</body>
</html>
