<link rel="stylesheet" href="../web/view-products/css/ratecmt.css">
<div class="card">
    <div class="card-header">ĐÁNH GIÁ - BÌNH LUẬN</div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4 text-center">
                <h1 class="text-warning mt-4 mb-4">
                    <b><span id="average_rating">0.0</span> / 5</b>
                </h1>
                <div class="mb-3">
                    <i class="fa fa-star star-light mr-1 main_star"></i>
                    <i class="fa fa-star star-light mr-1 main_star"></i>
                    <i class="fa fa-star star-light mr-1 main_star"></i>
                    <i class="fa fa-star star-light mr-1 main_star"></i>
                    <i class="fa fa-star star-light mr-1 main_star"></i>
                </div>
                <h3><span id="total_review">0</span> Đánh giá</h3>
            </div>
            <div class="col-sm-4">
                <p>
                <div class="progress-label-left"><b>5</b> <i class="fa fa-star text-warning"></i></div>

                <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                         aria-valuemax="100" id="five_star_progress"></div>
                </div>
                </p>
                <p>
                <div class="progress-label-left"><b>4</b> <i class="fa fa-star text-warning"></i></div>

                <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                         aria-valuemax="100" id="four_star_progress"></div>
                </div>
                </p>
                <p>
                <div class="progress-label-left"><b>3</b> <i class="fa fa-star text-warning"></i></div>

                <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                         aria-valuemax="100" id="three_star_progress"></div>
                </div>
                </p>
                <p>
                <div class="progress-label-left"><b>2</b> <i class="fa fa-star text-warning"></i></div>

                <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                         aria-valuemax="100" id="two_star_progress"></div>
                </div>
                </p>
                <p>
                <div class="progress-label-left"><b>1</b> <i class="fa fa-star text-warning"></i></div>

                <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                         aria-valuemax="100" id="one_star_progress"></div>
                </div>
                </p>
            </div>
            <div class="col-sm-4 text-center">
                <h3 class="mt-4 mb-3">Viết đánh giá</h3>
                <button class="review-btn">Đánh giá</button>
            </div>
        </div>
    </div>
</div>
<div class="mt-5" id="review_content"></div>

<!-- Start form rate and comments-->
<div class="modal-review hide-form">
    <div class="modal-inner-review">
        <div class="modal-header-review">
            <h5 class="modal-title">Đánh giá sản phẩm</h5>
            <i class="fa fa-times" style="cursor: pointer"></i>

        </div>
        <div class="modal-body-review">
                <h4 class="text-center mt-2 mb-4">
                    <i class="fa fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fa fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fa fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fa fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>
                <div class="form-group">
                    <input type="text" name="user_name" id="user_name" class="form-control"
                           placeholder="Enter Your Name"/>
                </div>
                <div class="form-group">
                    <textarea name="user_review" id="user_review" class="form-control"
                              placeholder="Type Review Here"></textarea>
                </div>
                <div class="form-group text-center mt-4">
                    <button type="button" class="btn btn-primary" id="save_review">Lưu</button>
                </div>

        </div>
    </div>
</div>

<!--End form rate and comments-->
<style>
    .hide-form {
        display: none;
    }
</style>
<script src="../web/view-products/js/ratecmt.js"></script>
