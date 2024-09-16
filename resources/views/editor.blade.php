<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Salam Editor</title>
    <link rel="shortcut icon" href="{{ asset("assets/images/favicon.ico") }}" type="image/x-icon">
    @vite(["resources/css/editor.css", "resources/css/app.css"])
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
            font-family: "estedad", sans-serif !important;
        }
    </style>
</head>
<body class="h-[100vh]">

<div class="my_container w-[98%] mx-auto flex justify-content-center gap-4 py-4 h-full md:flex-row flex-col">
    <div class="basis-1/2 h-full flex flex-col">
        <header class="bg-[#ff620021] basis-[65px] px-[10px] w-full rounded-[20px] flex justify-between items-center">
            <button class="run_code h-[50px] active:opacity-80 px-2 rounded-[15px] bg-[#FF6100] flex justify-center items-center gap-2 text-white">
                <span class="title block">اجرا</span>
                <svg viewBox="0 0 24 24" class="w-[21px]" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#000000" stroke-width="0.048"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M3 12L3 18.9671C3 21.2763 5.53435 22.736 7.59662 21.6145L10.7996 19.8727M3 8L3 5.0329C3 2.72368 5.53435 1.26402 7.59661 2.38548L20.4086 9.35258C22.5305 10.5065 22.5305 13.4935 20.4086 14.6474L14.0026 18.131" stroke="#ffffff" stroke-width="2.4" stroke-linecap="round"></path>
                    </g>
                </svg>
            </button>
        </header>
        <textarea class="code bg-[#ff620021] flex-1 w-full rounded-[20px] text-[25px] text-black mt-4 p-[15px] transition-all duration-300 !outline-0 !border-0 resize-none"></textarea>
    </div>
    <div class="basis-1/2">
        <iframe class="w-full h-full border rounded-[20px] border-1 border-[#FF6100] shadow-[0_0_20px_-10px_#FF6100]"></iframe>
        <pre class="error !hidden"></pre>
        <pre class="output !hidden"></pre>
    </div>
</div>
<script src="{{ asset("assets/salam/script/script.js") }}"></script>
</body>
</html>
