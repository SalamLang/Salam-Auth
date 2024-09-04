document.addEventListener("DOMContentLoaded", () => {
    const APP_URL = "http://127.0.0.1:8000";
    const $ = document;
    const elm_AuthBtn = $.querySelector("button#Auth");
    const elm_Email = $.querySelector("input#email");
    const SendRequestDelay = 200; //ms

    let change_data = null
    let title = $.querySelector("title").innerHTML;

    function errors_to_persian(error) {
        if (error === "email is required.") {
            return "ایمیل اجباری است."
        } else if (error === "email must be type email.") {
            return "ورودی باید از نوع ایمیل باشد."
        }
    }

    function show_errors(element, errorName, errors) {
        element.classList.add("invalid")
        let template = ''
        try {
            $.querySelector(".error-box").remove()
        } catch (error) {
        }
        template += '<div class="error-box mt-1">'
        switch (errorName) {
            case "email":
                errors.email.forEach(function (error) {
                    error = errors_to_persian(error)
                    template += `<span class="error text-[#FF5C00] mt-1 block">${error}</span>`;
                });
                break;
            default:
                console.error("not found errorName")
        }
        template += '</div>'
        element.insertAdjacentHTML("afterend", template)
    }

    function hide_errors(element = "all") {
        if (element !== "all") {
            element.classList.remove("invalid")
        } else {
            $.querySelector(".invalid").classList.remove("invalid")
        }
        try {
            $.querySelector(".error-box").style.display = "none"
        } catch (error) {
        }
    }

    function show_loading_btn(element) {
        element.disabled = true;
        element.innerHTML = `<img id="loading" src='${APP_URL + "/" + "assets/images/loading.png"}' alt=''>`;
    }

    function send_request(btn, onload, method, url, data) {
        show_loading_btn(btn)
        let xhr = new XMLHttpRequest()
        xhr.onload = () => {
            onload(xhr)
        }
        xhr.open(method, url);
        xhr.setRequestHeader('Content-type', 'application/json');
        setTimeout(() => {
            xhr.send(JSON.stringify(data))
        }, SendRequestDelay)
    }

    $.addEventListener('visibilitychange', function () {
        if ($.visibilityState === 'hidden') {
            $.title = 'کجا رفتی؟ بیا😒';
        } else {
            $.title = title;
        }
    });

    elm_AuthBtn.addEventListener("click", function () {
        if (change_data !== elm_Email.value){
            send_request(
                elm_AuthBtn,
                function (xhr) {
                    elm_AuthBtn.disabled = false;
                    if (JSON.parse(xhr.response).status === "Success") {
                        elm_AuthBtn.innerHTML = "مرحله بعد";
                        hide_errors()
                    } else {
                        elm_AuthBtn.innerHTML = "مرحله بعد";
                        let errors = JSON.parse(xhr.response).data.errors
                        show_errors(elm_Email, "email", errors)
                    }
                },
                "POST",
                APP_URL + "/" + "api/v1/auth",
                {email: elm_Email.value}
            )
            change_data = elm_Email.value
        }
    })

})