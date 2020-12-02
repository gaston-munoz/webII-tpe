"use strict";
document.addEventListener('DOMContentLoaded', loadFilters);

const toggleFilter = (e) => {
    e.preventDefault();
    document.querySelector('#section-filter').classList.toggle('d-none');
}

const goSearchPage = (e) => {
    e.preventDefault();

    const text = document.querySelector('#text-filter').value;
    const min = Number(document.querySelector('#min-filter').value) || 0;
    const max = Number(document.querySelector('#max-filter').value) || 999999999;

    console.log({ text, min, max })
    let query = new URLSearchParams({ text, min, max });
    console.log({ text, min, max })

    window.location.href = `busqueda/?${query}`;
}

function loadFilters() {
    const btn = document.querySelector('#btn-filter');
    btn.addEventListener('click', e => { toggleFilter(e) })

    document.querySelector('#go-filter').addEventListener('click', e => { goSearchPage(e) });
}