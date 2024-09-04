<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="ورود به حساب کاربری خود در سایت آموزش زبان برنامه‌نویسی سلام. اگر به یادگیری و توسعه مهارت‌های برنامه‌نویسی خود علاقه‌مند هستید، همین حالا وارد شوید و از منابع آموزشی متنوع استفاده کنید.">
    <meta name="keywords"
          content="ورود, لاگین, زبان برنامه‌نویسی سلام, حساب کاربری, برنامه‌نویسی, آموزش برنامه‌نویسی, یادگیری سلام">
    <meta name="author" content="Mohamadreza nasralezade">
    <title>ورود و ثبت نام</title>
    <link rel="shortcut icon" href="{{ asset("assets/images/salam.svg") }}" type="image/x-icon">
    {!! \App\Class\Vite::css("resources/css/app.css") !!}
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
        }
    </style>
</head>
<body class="m-0 p-0 relative box-border h-[100vh] overflow-hidden">

<div class="auth transition-all duration-300 max-w-[450px] fixed top-1/2 right-1/2 -translate-y-1/2 translate-x-1/2 px-[50px] w-full cus-bg rounded-[20px] flex flex-col justify-start items-center pt-5">
    <a href="/" class="logo cus-shadow w-[130px] p-5 overflow-hidden h-[130px] rounded-[40px] flex justify-center items-center bg-white">
        <img src="{{ asset("assets/images/salam.svg") }}" alt="logo" loading="lazy" class="w-full h-full">
    </a>
    <h1 class="text-black mt-5 font-bold text-[30px]">به جمع ما بپیوند!</h1>
    <form action="" onclick="return false;" class="w-full">
        <div class="input-box w-full mt-2">
            <label for="email" class="text-[#FF5C00] font-bold">ایمیل :</label>
            <br>
            <input type="email" id="email" name="email"
                   class="border-2 border-transparent transition-all duration-300 w-full mt-2 h-[55px] rounded-[15px] outline-0 p-3 placeholder-gray-300"
                   dir="ltr" placeholder="example@example.com">
        </div>
        <div class="input-box w-full mt-3">
            <a href="#" class="forgot-password text-[#276EF6] font-bold hover:underline">رمزت رو فراموش کردی؟</a>
        </div>
        <div class="input-box w-full">
            <button type="submit" id="Auth"
                    class="w-full text-white bg-[#FF5C00] flex transition-all duration-300 justify-center items-center mt-5 mb-7 h-[55px] rounded-[15px] outline-0 cursor-pointer"
                    dir="ltr">مرحله بعد
            </button>
        </div>
    </form>
</div>

<div class="register transition-all duration-300 max-w-[450px] fixed top-1/2 right-[200%] -translate-y-1/2 translate-x-1/2 px-[50px] w-full cus-bg rounded-[20px] flex flex-col justify-start items-center pt-5">
    <button class="absolute back-level-1 top-[20px] right-[20px] border-0 outline-0 rounded-full w-[40px] h-[40px] flex justify-center items-center bg-orange-300 hover:bg-orange-400 transition-all duration-300">
        <img src="{{ asset("assets/images/arrow-right.svg") }}" alt="back level 1" class="back-level-1 w-[30px] invert">
    </button>
    <a href="/" class="logo cus-shadow w-[130px] p-5 overflow-hidden h-[130px] rounded-[40px] flex justify-center items-center bg-white">
        <img src="{{ asset("assets/images/salam.svg") }}" alt="logo" loading="lazy" class="w-full h-full">
    </a>
    <h1 class="text-black mt-5 font-bold text-[30px]">ادامه بده!</h1>
    <p class="text-[14px] text-gray-400 text-center mt-1">اینجور که معلومه دفعه اولته! خیلی سریع اطلاعاتتو وارد کن تا عضوی از ما بشی😉</p>
    <form action="" onclick="return false;" class="w-full">
        <div class="input-box w-full mt-2">
            <label for="email" class="text-[#FF5C00] font-bold">ایمیل :</label>
            <br>
            <input type="email" id="email" name="email"
                   class="border-2 border-transparent transition-all duration-300 w-full mt-2 h-[55px] rounded-[15px] outline-0 p-3 placeholder-gray-300"
                   dir="ltr" placeholder="example@example.com">
        </div>
        <div class="input-box w-full">
            <button type="submit" id="Auth"
                    class="w-full text-white bg-[#FF5C00] flex transition-all duration-300 justify-center items-center mt-5 mb-7 h-[55px] rounded-[15px] outline-0 cursor-pointer"
                    dir="ltr">ادامه بده
            </button>
        </div>
    </form>
</div>

<div class="login transition-all duration-300 max-w-[450px] fixed top-1/2 right-[200%] -translate-y-1/2 translate-x-1/2 px-[50px] w-full cus-bg rounded-[20px] flex flex-col justify-start items-center pt-5">
    <button class="absolute back-level-1 top-[20px] right-[20px] border-0 outline-0 rounded-full w-[40px] h-[40px] flex justify-center items-center bg-orange-300 hover:bg-orange-400 transition-all duration-300">
        <img src="{{ asset("assets/images/arrow-right.svg") }}" alt="back level 1" class="back-level-1 w-[30px] invert">
    </button>
    <a href="/" class="logo cus-shadow w-[130px] p-5 overflow-hidden h-[130px] rounded-[40px] flex justify-center items-center bg-white">
        <img src="{{ asset("assets/images/salam.svg") }}" alt="logo" loading="lazy" class="w-full h-full">
    </a>
    <h1 class="text-black mt-5 font-bold text-[30px]">خوش اومدی</h1>
    <p class="text-[14px] text-gray-400 text-center mt-1">اینجور که معلومه دفعه اولت نسیت! برای وارد شدن اطلاعاتت رو کامل کن</p>
    <form action="" onclick="return false;" class="w-full">
        <div class="input-box w-full mt-2">
            <label for="email_login" class="text-[#FF5C00] font-bold">ایمیل :</label>
            <br>
            <input type="email" id="email_login" name="email_login"
                   class="border-2 border-transparent transition-all duration-300 w-full mt-2 h-[55px] rounded-[15px] outline-0 p-3 placeholder-gray-300"
                   dir="ltr" placeholder="example@example.com">
        </div>
        <div class="input-box w-full mt-2">
            <label for="password_login" class="text-[#FF5C00] font-bold">رمز عبور :</label>
            <br>
            <input type="password" id="password_login" name="password_login"
                   class="border-2 border-transparent transition-all duration-300 w-full mt-2 h-[55px] rounded-[15px] outline-0 p-3 placeholder-gray-300"
                   dir="ltr" placeholder="example@example.com">
        </div>
        <div class="input-box w-full">
            <button type="submit" id="Auth"
                    class="w-full text-white bg-[#FF5C00] flex transition-all duration-300 justify-center items-center mt-5 mb-7 h-[55px] rounded-[15px] outline-0 cursor-pointer"
                    dir="ltr">ورود
            </button>
        </div>
    </form>
</div>

<div class="forgot transition-all duration-300 max-w-[450px] fixed top-1/2 right-[200%] -translate-y-1/2 translate-x-1/2 px-[50px] w-full cus-bg rounded-[20px] flex flex-col justify-start items-center pt-5">
    <button class="absolute top-[20px] right-[20px] border-0 outline-0 rounded-full w-[40px] h-[40px] flex justify-center items-center bg-orange-300 hover:bg-orange-400 transition-all duration-300 back-level-1">
        <img src="{{ asset("assets/images/arrow-right.svg") }}" alt="back level 1" class="w-[30px] invert">
    </button>
    <a href="/" class="logo cus-shadow w-[130px] p-5 overflow-hidden h-[130px] rounded-[40px] flex justify-center items-center bg-white">
        <img src="{{ asset("assets/images/salam.svg") }}" alt="logo" loading="lazy" class="w-full h-full">
    </a>
    <h1 class="text-black mt-5 font-bold text-[30px]">رمزت یادت رفته؟</h1>
    <p class="text-[15px] text-gray-500 text-center">ایمیلت رو وارد کن</p>
    <form action="" onclick="return false;" class="w-full">
        <div class="input-box w-full mt-2">
            <label for="email_forgot" class="text-[#FF5C00] font-bold">ایمیل :</label>
            <br>
            <input type="email" id="email_forgot" name="email_forgot"
                   class="border-2 border-transparent transition-all duration-300 w-full mt-2 h-[55px] rounded-[15px] outline-0 p-3 placeholder-gray-300"
                   dir="ltr" placeholder="example@example.com">
        </div>
        <div class="input-box w-full">
            <button type="submit" id="send-forgot"
                    class="w-full text-white bg-[#FF5C00] flex transition-all duration-300 justify-center items-center mt-5 mb-7 h-[55px] rounded-[15px] outline-0 cursor-pointer"
                    dir="ltr">بازیابی
            </button>
        </div>
    </form>
</div>

{!! \App\Class\Vite::js("resources/js/app.js") !!}
</body>
</html>