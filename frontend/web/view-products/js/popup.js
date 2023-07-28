var btnOpen = document.querySelector('.open-modal-btn');
var modalQR = document.querySelector('.modal-qrcode');
var iconClose = document.querySelector('.modal-header-qr i');

function toggleModalQR() {
    modalQR.classList.toggle('hide-qr');
}

btnOpen.addEventListener('click', toggleModalQR);
iconClose.addEventListener('click', toggleModalQR);
modalQR.addEventListener('click', function (event) {
    if (event.target == event.currentTarget) {
        toggleModalQR();
    }
});






