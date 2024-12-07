import './bootstrap';

import 'laravel-datatables-vite';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const elm_inputs = document?.querySelectorAll('input')

elm_inputs?.forEach((item) => {
    let next = item?.nextElementSibling?.tagName?.toLowerCase()

    if (next === "ul"){
        item.classList.add("invalid")
    }
})
