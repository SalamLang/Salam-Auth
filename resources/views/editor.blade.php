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
            <div class="flex justify-center items-center gap-2">
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
                <button class="refactor h-[50px] active:opacity-80 px-2 rounded-[15px] bg-[#2c74ff] flex justify-center items-center gap-2 text-white">
                    <span class="title">تمیز‌کردن</span>
                    <svg viewBox="0 0 24 24" class="w-[21px]" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M11.4096 5.50506C13.0796 3.83502 13.9146 3 14.9522 3C15.9899 3 16.8249 3.83502 18.4949 5.50506C20.165 7.1751 21 8.01013 21 9.04776C21 10.0854 20.165 10.9204 18.4949 12.5904L14.3017 16.7837L7.21634 9.69828L11.4096 5.50506Z" fill="#ffffff"></path>
                            <path d="M6.1557 10.759L13.2411 17.8443L12.5904 18.4949C12.2127 18.8727 11.8777 19.2077 11.5734 19.5H21C21.4142 19.5 21.75 19.8358 21.75 20.25C21.75 20.6642 21.4142 21 21 21H9C7.98423 20.9747 7.1494 20.1393 5.50506 18.4949C3.83502 16.8249 3 15.9899 3 14.9522C3 13.9146 3.83502 13.0796 5.50506 11.4096L6.1557 10.759Z" fill="#ffffff"></path>
                        </g>
                    </svg>
                </button>
                <form action="{{ route("login") }}" method="post" class="flex gap-2">
                    <input type="text" name="title" class="input_title transition-all duration-300 rounded-[10px] placeholder-gray-400 w-0 p-0 hidden" placeholder="عنوان مورد نظر..." required minlength="3">
                    <button type="submit" class="save h-[50px] active:opacity-80 px-2 rounded-[15px] bg-[#D1FF6E] flex justify-center items-center gap-2 text-black">
                        <span class="title">ذخیره</span>
                        <svg viewBox="0 0 24 24" class="w-[22px]" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M12.89 5.87891H5.11C3.4 5.87891 2 7.27891 2 8.98891V20.3489C2 21.7989 3.04 22.4189 4.31 21.7089L8.24 19.5189C8.66 19.2889 9.34 19.2889 9.75 19.5189L13.68 21.7089C14.96 22.4089 16 21.7989 16 20.3489V8.98891C16 7.27891 14.6 5.87891 12.89 5.87891Z" fill="#292D32"></path>
                                <path d="M21.9998 5.11V16.47C21.9998 17.92 20.9598 18.53 19.6898 17.83L17.7598 16.75C17.5998 16.66 17.4998 16.49 17.4998 16.31V8.99C17.4998 6.45 15.4298 4.38 12.8898 4.38H8.81984C8.44984 4.38 8.18984 3.99 8.35984 3.67C8.87984 2.68 9.91984 2 11.1098 2H18.8898C20.5998 2 21.9998 3.4 21.9998 5.11Z" fill="#292D32"></path>
                            </g>
                        </svg>
                    </button>
                </form>
            </div>
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
