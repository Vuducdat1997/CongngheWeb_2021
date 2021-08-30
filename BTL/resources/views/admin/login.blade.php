<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Đăng nhập hệ thống</title>
    <base href="{{asset('')}}">
    <style>
    input:focus,
    button:focus {
        outline: 0;
    }

    #dangnhap {
        display: flex;
        justify-content: center;
        align-items: center;
        height: auto;
        background: linear-gradient(to bottom right, #9b59b6, #3498db, #26ade4);
        height: 700px;
    }

    #dangnhap>div {
        border: 1px solid black;
        border-radius: 15px;
        width: 300px;
        height: 500px;
        text-align: center;
        background-color: white;
    }

    #user,
    #pass {
        border: none;
        border-bottom: 1px solid #3498db;
        height: 30px;
        width: 200px;
        margin: 15px 0px;
    }

    #btn-dangnhap {
        border-radius: 10px;
        color: white;
        margin: 35px 0px;
        width: 200px;
        height: 25px;
        background: linear-gradient(to bottom right, #9b59b6, #3498db, #26ade4);
        border: none;
    }

    .icon {
        margin-top: 30px;
    }

    .icon a img {
        width: 30px;
        height: 30px;
    }

    .form-group.form-check {
        text-align: left;
        margin: 20px 0px 0px 45px;
    }

    #gan {
        color: red;
    }
    </style>
</head>

<body>
    <div id="dangnhap">
        <div class="dangnhap-container">
            <h2>Đăng nhập hệ thống</h2>

            @if(session('errors'))
            <div class="alert alert-success">
                <p>{{ session('errors') }}</p>
            </div>
            @endif

            @if(session('thongbao'))
            <div class="alert alert-success">
                <p>{{ session('thongbao') }}</p>
            </div>
            @endif

            <form role="form" action="{{url('login')}}" method="post">
                @csrf
                <input type="email" name="email" id="user" placeholder="Email" /><br />
                <input type="password" name="password" id="pass" placeholder="Mật Khẩu" /><br />
                <button type="submit" target="_self" id="btn-dangnhap">
                    Đăng nhập
                </button>
            </form>
            <div id="gan"></div>
            <p>Bạn chưa có tài khoản? Đăng ký <a href="">Tại đây</a></p>
            <div class="icon">
                <a href="https://www.facebook.com/vumanhdung.dhtl"><img
                        src="https://www.iconfinder.com/data/icons/capsocial-round/500/facebook-512.png" alt="" /></a>
                <a href="#"><img
                        src="https://icons-for-free.com/iconfiles/png/512/videos+watch+website+youtube+icon-1320168606023940607.png"
                        alt="" /></a>
                <a
                    href="https://mail.google.com/mail/u/0/#inbox?compose=jrjtXLCCRFDPgzShkjDxNVSXchGCPwWvHgKQrrFfLWsCNqTjRVWwzTFWXJdDvmmzHGgzdQCM"><img
                        src="https://www.iconfinder.com/data/icons/social-icons-circular-color/512/gmail-512.png"
                        alt="" /></a>
            </div>
        </div>
    </div>
</body>

</html>