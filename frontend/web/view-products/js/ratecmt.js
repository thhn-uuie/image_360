var btnReview = document.querySelector('.review-btn');
var modalReview = document.querySelector('.modal-review');
var iconClose = document.querySelector('.modal-header-review i');

function toggleModalReview() {
    modalReview.classList.toggle('hide-form');
}

btnReview.addEventListener('click', toggleModalReview);
iconClose.addEventListener('click', toggleModalReview);

modalReview.addEventListener('click', function (event) {
    if (event.target === event.currentTarget) {
        toggleModalReview();
    }
});
//
// document.addEventListener('mouseenter', function(event) {
//     if (event.target.classList.contains('submit_star')) {
//         var rating = event.target.dataset.rating;
//         resetBackground();
//         for (var count = 1; count <= rating; count++) {
//             document.getElementById('submit_star_' + count).classList.add('text-warning');
//         }
//     }
// });
// function resetBackground() {
//     for (var count = 1; count <= 5; count++) {
//         var element = document.getElementById('submit_star_' + count);
//         element.classList.add('star-light');
//         element.classList.remove('text-warning');
//     }
// }
//
// document.addEventListener('mouseleave', function(event) {
//     if (event.target.classList.contains('submit_star')) {
//         resetBackground();
//         for (var count = 1; count <= ratingData; count++) {
//             var element = document.getElementById('submit_star_' + count);
//             element.classList.remove('star-light');
//             element.classList.add('text-warning');
//         }
//     }
// });
//
// document.addEventListener('click', function(event) {
//     if (event.target.classList.contains('submit_star')) {
//         ratingData = event.target.dataset.rating;
//     }
// });
//
// document.getElementById('save_review').addEventListener('click', function() {
//     var userName = document.getElementById('userName').value;
//     var userReview = document.getElementById('userReview').value;
//     if (userName === '' || userReview === '') {
//         alert('Please Fill Both Field');
//         return false;
//     } else {
//         var xhr = new XMLHttpRequest();
//         xhr.open('POST', 'submit_rating.php', true);
//         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//         xhr.onreadystatechange = function() {
//             if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
//                 document.getElementById('review_modal').classList.remove('show');
//                 document.getElementById('review_modal').classList.remove('fade');
//                 document.getElementById('review_modal').setAttribute('aria-hidden', 'true');
//                 document.getElementById('review_modal').style.display = 'none';
//                 load_ratingData();
//                 alert(this.response);
//             }
//         }
//         xhr.send('ratingData=' + ratingData + '&userName=' + userName + '&userReview=' + userReview);
//     }
// });
//





