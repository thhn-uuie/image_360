<?php
$id_products_current = Yii::$app->request->get('id_products');

?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>
<body>
<div class="card">
    <div class="card-header"><strong>ĐÁNH GIÁ - BÌNH LUẬN SẢN PHẨM</strong></div>
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
                <h3><span id="total_review">0</span> Review</h3>
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
                <h3 class="mt-4 mb-3">Write Review Here</h3>
                <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
            </div>
        </div>
    </div>
</div>
<div class="mt-5" id="review_content"></div>




<div id="review_modal" class="modal-review" role="dialog">
    <div class="modal-review-dialog" role="document">
        <div class="modal-review-content">
            <div class="modal-review-header">
                <h5 class="modal-review-title">Submit Review</h5>
                <i id="icon-close"  class="fa fa-times" style="cursor: pointer"></i>
            </div>
            <div class="modal-review-body">
                <h4 class="text-center mt-2 mb-4">
                    <i class="fa fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fa fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fa fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fa fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>
<!--                <div class="form-group">-->
<!--                    <input type="text" name="id_products" id="id_products" class="form-control"-->
<!--                           placeholder="Enter Your Name"/>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>-->
<!--                </div>-->

                <?= Html::textInput('id_products', Yii::$app->user->identity->getId(), ['class' => 'form-control', 'placeholder' => 'Id products']) ?>
<!--                <div class="form-group">-->
<!--                    <input type="number" name="id_user" id="id_user" class="form-control" placeholder="Id user" />-->
<!--                </div>-->
                <div class="form-group">
                    <textarea name="comment" id="comment" class="form-control" placeholder="Comment"></textarea>
                </div>



                <div class="form-group text-center mt-4">
                    <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<style>
    .modal-review {
        position: absolute;
        z-index: 200;
        opacity: 0;
        visibility: hidden;
    }
    .modal-review-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-left: 15px;
        margin-right: 15px;
    }

    .progress-label-left {
        float: left;
        margin-right: 0.5em;
        line-height: 1em;
    }

    .progress-label-right {
        float: right;
        margin-left: 0.3em;
        line-height: 1em;
    }

    .star-light {
        color: #e9ecef;
    }

    .modal-review.show-form {
        opacity: 1;
        visibility: visible;
        opacity: 1;
        visibility: visible;
        background: #c1b8ff;
        width: 70%;
        margin-left: 15%;
    }
</style>

<script>

    $(document).ready(function () {

        var rating_data = 0;

        $('#add_review').click(function () {

            $('#review_modal').toggleClass('show-form');

        });
        $('#icon-close').click(function () {
            $('#review_modal').toggleClass('show-form');
        });


        $(document).on('mouseenter', '.submit_star', function(){

            var rating = $(this).data('rating');

            reset_background();

            for(var count = 1; count <= rating; count++)
            {

                $('#submit_star_'+count).addClass('text-warning');

            }

        });

        function reset_background()
        {
            for(var count = 1; count <= 5; count++)
            {

                $('#submit_star_'+count).addClass('star-light');

                $('#submit_star_'+count).removeClass('text-warning');

            }
        }

        $(document).on('mouseleave', '.submit_star', function(){

            reset_background();

            for(var count = 1; count <= rating_data; count++)
            {

                $('#submit_star_'+count).removeClass('star-light');

                $('#submit_star_'+count).addClass('text-warning');
            }

        });

        $(document).on('click', '.submit_star', function(){

            rating_data = $(this).data('rating');

        });

        $('#save_review').click(function(){
            var id_products = $('#id_products').val();

            // var id_user = $('#id_user').val();

            var comment = $('#comment').val();

            if(id_products == '' || comment == '')
            {
                alert("Không được để trống");
                return false;
            }
            else
            {
                $.ajax({
                    url:"../views/products/star_rating.php",
                    method:"POST",
                    data:{rating_data:rating_data, id_producs:id_products,  comment:comment},
                    success:function(data)
                    {
                        $('#review_modal').toggleClass('show-form');

                        load_rating_data();

                        alert(data);
                    }
                })
            }

        });

        load_rating_data();

        function load_rating_data()
        {
            $.ajax({
                url:"../views/products/star_rating.php",
                method:"POST",
                data:{action:'load_data'},
                dataType:"JSON",
                success:function(data)
                {
                    $('#average_rating').text(data.average_rating);
                    $('#total_review').text(data.total_review);

                    var count_star = 0;

                    $('.main_star').each(function(){
                        count_star++;
                        if(Math.ceil(data.average_rating) >= count_star)
                        {
                            $(this).addClass('text-warning');
                            $(this).addClass('star-light');
                        }
                    });

                    $('#total_five_star_review').text(data.five_star_review);

                    $('#total_four_star_review').text(data.four_star_review);

                    $('#total_three_star_review').text(data.three_star_review);

                    $('#total_two_star_review').text(data.two_star_review);

                    $('#total_one_star_review').text(data.one_star_review);

                    $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                    $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                    $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                    $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                    $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                    if(data.review_data.length > 0)
                    {
                        var html = '';

                        for(var count = 0; count < data.review_data.length; count++)
                        {
                            html += '<div class="row mb-3">';

                            html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].comment.charAt(0)+'</h3></div></div>';

                            html += '<div class="col-sm-11">';

                            html += '<div class="card">';

                            html += '<div class="card-header"><b>'+data.review_data[count].comment+'</b></div>';

                            html += '<div class="card-body">';

                            for(var star = 1; star <= 5; star++)
                            {
                                var class_name = '';

                                if(data.review_data[count].rating >= star)
                                {
                                    class_name = 'text-warning';
                                }
                                else
                                {
                                    class_name = 'star-light';
                                }

                                html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                            }

                            html += '<br />';

                            html += data.review_data[count].comment;

                            html += '</div>';

                            html += '<div class="card-footer text-right">On '+data.review_data[count].time_rate+'</div>';

                            html += '</div>';

                            html += '</div>';

                            html += '</div>';
                        }

                        $('#review_content').html(html);
                    }
                }
            })
        }

    });

</script>