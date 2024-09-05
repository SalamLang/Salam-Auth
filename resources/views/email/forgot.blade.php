<!doctype html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <style>
        @font-face {
            font-family: "estedad";
            font-weight: 100;
            src: url({{ asset("assets/fonts/Estedad-Thin.ttf") }});
        }

        @font-face {
            font-family: "estedad";
            font-weight: 300;
            src: url({{ asset("assets/fonts/Estedad-Light.ttf") }});
        }

        @font-face {
            font-family: "estedad";
            font-weight: 400;
            src: url({{ asset("assets/fonts/Estedad-Medium.ttf") }});
        }

        @font-face {
            font-family: "estedad";
            font-weight: 700;
            src: url({{ asset("assets/fonts/Estedad-Bold.ttf") }});
        }

        @font-face {
            font-family: "estedad";
            font-weight: 900;
            src: url({{ asset("assets/fonts/Estedad-Black.ttf") }});
        }

        * {
            font-family: "estedad", sans-serif;
            box-sizing: border-box;
        }
    </style>
</head>
<body style="height: 100vh; margin: 0;padding: 50vh 0 0 0;">
<center style="">
    <div style="background-color: rgba(255, 92, 0, 0.06);width: 450px;min-height: 300px;border-radius: 20px;margin-top: -150px;padding-right: 50px;padding-left: 50px">
        <a href="/"
           style="display: inline-block;width: 130px;padding: 20px;overflow: hidden;height: 130px;border-radius: 40px;background-color: white;margin-top: 20px">
            <img src="{{ asset("assets/images/salam.svg") }}" alt="logo" loading="lazy"
                 style="width: 100%;height: 100%">
        </a>
        <h1 style="font-size: 30px;font-weight: bold;margin: 0;color: black;">بازیابی رمز عبور</h1>
        <h1 style="font-size: 30px;font-weight: bold;margin: 0;color: #FF5C00;">سلام {{ $name }}</h1>
        <p style="width: 300px;font-size: 15px;color: #444444;margin: 5px 0 0 0">برای بازیابی رمز عبورت کافیه روی دکمه
            زیر بزنی تا به سایت منتقل بشی و بتونی رمز جدیدتو انتخاب کنی! میبینی چقدر راحته😉</p>
        <a href="{{ $url }}"
           style="width: 100%;height: 50px;border-radius: 15px;margin-top: 15px;margin-bottom:20px;background-color: #276EF6;display: inline-block;color: white;text-align: center;text-decoration: none;font-size: 18px;padding-top: 8px">بازیابی</a>
    </div>
</center>
</body>
</html>