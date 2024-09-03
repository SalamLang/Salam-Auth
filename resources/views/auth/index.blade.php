<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
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
<body class="flex justify-center items-center m-0 p-0 box-border h-[100vh]">
<div class="max-w-[450px] px-[50px] w-full cus-bg rounded-[20px] flex flex-col justify-start items-center pt-5">
    <div class="logo cus-shadow w-[140px] h-[140px] rounded-[40px] flex justify-center items-center bg-white">
        <img src="{{ asset("assets/images/salam.svg") }}" alt="">
    </div>
    <h1 class="text-black mt-5 font-bold text-[30px]">به جمع ما بپیوند!</h1>
    <div class="input-box w-full mt-2">
        <label for="email" class="text-[#FF5C00] font-bold">ایمیل</label>
        <br>
        <input type="email" id="email" name="email"
               class="border-2 border-transparent transition-all duration-300 w-full mt-2 h-[55px] rounded-[15px] outline-0 p-3 placeholder-gray-300"
               dir="ltr" placeholder="exampleEmail@example.com">
    </div>
    <div class="input-box w-full">
        <input type="submit" id="email" name="email"
               class="w-full text-white bg-[#FF5C00] flex justify-center items-center mt-5 mb-7 h-[55px] rounded-[15px] outline-0 cursor-pointer"
               dir="ltr" value="مرحله بعد">
    </div>
</div>

{!! \App\Class\Vite::js("resources/js/app.js") !!}
</body>
</html>