var btnOpen = document.querySelector('.open-modal-btn');
var modal_qr = document.querySelector('.modal-qrcode');
var iconClose = document.querySelector('.modal-header-qr i');

function toggleModalQR() {
    modal_qr.classList.toggle('hide-qr');
}

btnOpen.addEventListener('click', toggleModalQR);
iconClose.addEventListener('click', toggleModalQR);
modal_qr.addEventListener('click', function (e) {
    if (e.target == e.currentTarget) {
        toggleModalQR();
    }
});






