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
		
		if (elm_code.value !== "") {
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

	const code = elm_code.value.toString().trim();
	if (!code) {
		return;
	}

	const arguments = ["lint", "code", code];

	const res = captureLint(arguments);
	if (res !== null) {
		elm_code.value = res.toString().trim();
	}
};

const runSalam = (showOutput) => {
	console.log("Running Salam code...");

	const code = elm_code.value.toString().trim();
	if (!code) {
		elm_error.innerHTML = "";
		elm_output.innerHTML = "";

		return;
	}

	const arguments = ["code", code];

	captureOutput(showOutput, arguments);
};

// Events
elm_code.addEventListener("keydown", (event) => {
	if (event.key === "Tab") {
		event.preventDefault();

		const textarea = event.target;
		const start = textarea.selectionStart;
		const end = textarea.selectionEnd;

		textarea.value = textarea.value.substring(0, start) + "\t" + textarea.value.substring(end);
		textarea.selectionStart = textarea.selectionEnd = start + 1;
	}
});

elm_code.addEventListener("input", () => {
	localStorage.setItem("code", elm_code.value)
	elm_copy_code.value = elm_code.value
	runSalam(false);
});

elm_run_code.addEventListener("click", () => {
	elm_copy_code.value = elm_code.value
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
	
	if (elm_code.value.trim() === "") {
		if (localStorage && localStorage.getItem) {
			elm_code.value = localStorage.getItem("code");
		}
	}

	elm_copy_code.value = elm_code.value;
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
