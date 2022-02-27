window.bootstrap  = require('bootstrap');
window.$ = window.jQuery = require('jquery');
window.Swal = require('sweetalert2');
require('datatables.net-bs5');

$(document).ready(function () {
    //Offcanvas Bootstrap
    let offcanvasElementList = [].slice.call(document.querySelectorAll('.offcanvas'))
    offcanvasElementList.map(function (offcanvasEl) {
        return new bootstrap.Offcanvas(offcanvasEl)
    });

    //Tooltips Bootstrap
    let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    //Popovers Bootstrap
    let popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    });

    //Ajax Header
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
