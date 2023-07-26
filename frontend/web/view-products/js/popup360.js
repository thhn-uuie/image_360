var btnOpen360 = document.querySelector('.open-modal-btn-360');
var modal_360 = document.querySelector('.modal-360');
var iconClose360 = document.querySelector('.modal-header-360 i');

function toggleModal360() {
    modal_360.classList.toggle('hide-360');
}

btnOpen360.addEventListener('click', toggleModal360);
iconClose360.addEventListener('click', toggleModal360);
modal_360.addEventListener('click', function (e) {
    if (e.target == e.currentTarget) {
        toggleModal360();
    }
})