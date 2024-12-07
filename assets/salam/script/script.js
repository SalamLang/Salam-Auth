// Variables
let is_running = false;

// Elements
const elm_code = document.querySelector(".code");
const elm_output = document.querySelector(".output");
const elm_error = document.querySelector(".error");
const elm_iframe = document.querySelector("iframe");
const elm_run_code = document.querySelector(".run_code");
const elm_refactor = document.querySelector(".refactor");
const elm_save = document.querySelector(".save");
const elm_title = document.querySelector(".input_title");
const elm_copy_code = document.querySelector(".copy_code");
const elm_download_project = document.querySelector(".download_project");

// Global variables
var Module = {
	noInitialRun: true,
	onRuntimeInitialized: () => {
		console.log("Salam loaded successfully");

		if (elm_code.innerText !== "") {
			runSalam(false);
		}
	},
	print: (text) => {
		displayOutput(text);
	},
	printErr: (text) => {
		displayError(text);
	},
};

// Functions
const displayOutput = (text) => {
	console.log("Output: ", text);
	elm_output.textContent += text + "\n";
};

const displayError = (text) => {
	console.error("Error: ", text);

	// TODO: Ignore keepRuntimeAlive() warning
	if (text === "program exited (with status: 2), but keepRuntimeAlive() is set (counter=0) due to an async operation, so halting execution but not exiting the runtime or preventing further async execution (you can use emscripten_force_exit, if you want to force a true shutdown)") {
		return;
	}

	elm_error.textContent += text + "<br>";
};

const getIframeContent = (iframe) => {
	return iframe.contentDocument || iframe.contentWindow.document;
};

const showErrorInIframe = () => {
	const iframeDocument = getIframeContent(elm_iframe);

	if (iframeDocument) {
		iframeDocument.open();
		iframeDocument.write(`<!DOCTYPE html>
<html dir="rtl" lang="fa-IR">
	<body>
		<div style="color: red; font-weight: bold;"><b>خطا:</b> ${elm_error.innerHTML}</div>
	</body>
</html>`);
		iframeDocument.close();
	}
};

const captureLint = (arguments) => {
	console.log("Capture Lint: ", arguments);

	elm_output.textContent = "";
	elm_error.textContent = "";

	if (is_running) {
		return;
	}

	try {
		is_running = true;

		let exitCode;
		if (typeof callMain === "function") {
			exitCode = callMain(arguments);

			is_running = false;
		} else {
			console.error("callMain is not defined. Ensure NO_EXIT_RUNTIME is enabled.");

			is_running = false;
			return;
		}

		if (exitCode !== 0) {
			return null;
		} else {
			return elm_output.textContent;
		}
	} catch (err) {
		is_running = false;

		return null;
	}
};

const captureOutput = (showOutput, arguments) => {
	console.log("Capture Output: ", arguments);

	elm_output.textContent = "";
	elm_error.textContent = "";

	if (is_running) {
		return;
	}

	is_running = true;

	try {
		let exitCode;

		if (typeof callMain === "function") {
			exitCode = callMain(arguments);

			is_running = false;
		} else {
			elm_error.innerHTML = "برنامه با خطا مواجه شد.";

			showErrorInIframe();

			is_running = false;
			return;
		}

		if (exitCode !== 0) {
			elm_error.innerHTML = "برنامه با خطا مواجه شد.<br>" + elm_error.textContent;

			showErrorInIframe();
		} else {
			const iframeDocument = getIframeContent(elm_iframe);

			if (iframeDocument) {
				iframeDocument.open();
				iframeDocument.write(elm_output.textContent);
				iframeDocument.close();
			}
		}
	} catch (err) {
		is_running = false;

		console.error(err);

		elm_error.textContent = "خطای غیرمنتظره رخ داد.";
		showErrorInIframe();
	}
};

const runLint = () => {
	console.log("Running Salam lint...");

	const code = elm_code.innerText.toString().trim();
	if (!code) {
		return;
	}

	const arguments = ["lint", "code", code];

	const res = captureLint(arguments);
	if (res !== null) {
		elm_code.innerText = res.toString().trim();
	}
};

const runSalam = (showOutput) => {
	console.log("Running Salam code...");

	let code = elm_code.innerText;
	// function replaceNbsps(str) {
	// 	var re = new RegExp(String.fromCharCode(160), "g");
	// 	return str.replace(re, " ");
	// }
	// code = replaceNbsps(code)

	console.log(code)

	function strip(html){
		let doc = new DOMParser().parseFromString(html, 'text/html');
		return doc.body.textContent || "";
	}

	code = strip(code);

	if (!code) {
		elm_error.innerHTML = "";
		elm_output.innerHTML = "";

		return;
	}

	const arguments = ["code", code];

	captureOutput(showOutput, arguments);
};

// Events
function setCaretPosition(el, pos) {
	const range = document.createRange();
	const sel = window.getSelection();
	range.setStart(el.childNodes[0] || el, pos);
	range.collapse(true);
	sel.removeAllRanges();
	sel.addRange(range);
}
elm_code.addEventListener("input", () => {
	localStorage.setItem("code", elm_code.innerText)
	elm_copy_code.value = elm_code.innerText
	runSalam(false);
});

elm_run_code.addEventListener("click", () => {
	elm_copy_code.value = elm_code.innerText
	runSalam(false)
})

elm_refactor.addEventListener("click", () => {
	runLint()
})

elm_save.addEventListener("click", (e) => {
	if (elm_title.classList.contains("hidden")){
		e.preventDefault()
		elm_title.classList.remove("hidden")
		elm_title.classList.remove("w-0")
		elm_title.classList.remove("p-0")
	}
});

elm_download_project.addEventListener("click", (e) => {
    const code = elm_output.textContent;

    if (elm_error.textContent !== "") {
        alert(elm_error.textContent); // TODO
        return;
    }

    if (code === "") {
        alert("Error: code is empty"); // TODO
        return;
    }

    const blob = new Blob([code], { type: "text/html" });

    const link = document.createElement("a");
    link.href = URL.createObjectURL(blob);
    link.download = "project.html";

    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
});

// Init
const script = document.createElement("script");
script.type = "text/javascript";
script.src = "/assets/salam/salam-wa.js";
document.body.appendChild(script);

window.addEventListener("load", () => {
	elm_code.focus();

	if (elm_code.innerText.trim() === "") {
		if (localStorage && localStorage.getItem) {
			elm_code.innerText = localStorage.getItem("code");
		}
	}

	elm_copy_code.value = elm_code.innerText;
});

// Cache
if ("serviceWorker" in navigator) {
	navigator.serviceWorker.register("/service-worker.js").then(() => {
		console.log("Service Worker Registered");
	})
		.catch(error => {
			console.log("Service Worker Registration Failed:", error);
		});
}


const elm_inputs = document?.querySelectorAll('input')

elm_inputs?.forEach((item) => {
    let next = item?.nextElementSibling?.tagName?.toLowerCase()

    if (next === "ul"){
        item.classList.add("invalid")
    }
})
