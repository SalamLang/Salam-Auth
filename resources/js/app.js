document.addEventListener("DOMContentLoaded", () => {
    const APP_URL = "http://127.0.0.1:8000";
    const $ = document;
    const elm_AuthBtn = $.querySelector("button#Auth");
    const elm_Email = $.querySelector("input#email");
    const SendRequestDelay = 200; //ms

    let title = $.querySelector("title").innerHTML;

    elm_AuthBtn.addEventListener("click", function () {
        elm_AuthBtn.disabled = true;
        elm_AuthBtn.innerHTML = `<img id="loading" src='${APP_URL + "/" + "assets/images/loading.png"}' alt=''>`;
        let xhr = new XMLHttpRequest()
        xhr.onload = function () {
            elm_AuthBtn.disabled = false;
            if (JSON.parse(xhr.response).length === 0) {
                elm_AuthBtn.innerHTML = "ادامه بده";
                elm_Email.classList.remove("invalid")
                try {
                    $.querySelector(".error-box").style.display = "none"
                } catch (error) {
                }
            } else {
                elm_AuthBtn.innerHTML = "مرحله بعد";
                let errors = JSON.parse(xhr.response)
                elm_Email.classList.add("invalid")
                let template = ''
                try {
                    $.querySelector(".error-box").remove()
                } catch (error) {
                }
                template += '<div class="error-box mt-1">'
                errors.email.forEach(function (error) {
                    if (error === "email is required.") {
                        error = "ایمیل اجباری است."
                    } else if (error === "email must be type email.") {
                        error = "ورودی باید از نوع ایمیل باشد."
                    }
                    template += `<span class="error text-[#FF5C00] mt-1 block">${error}</span>`;
                });
                template += '</div>'
                elm_Email.insertAdjacentHTML("afterend", template)
            }
        }
        xhr.open("POST", APP_URL + "/" + "api/v1/auth");
        xhr.setRequestHeader('Content-type', 'application/json');
        setTimeout(() => {
            xhr.send(JSON.stringify({
                email: elm_Email.value
            }))
        }, SendRequestDelay)
    })

    $.addEventListener('visibilitychange', function () {
        if ($.visibilityState === 'hidden') {
            $.title = 'کجا رفتی؟ بیا😒';
        } else {
            $.title = title;
        }
    });
})