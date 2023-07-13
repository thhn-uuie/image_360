<?php

use yii\helpers\Html;
use yii\widgets\DetailView;



/** @var yii\web\View $this */
/** @var common\models\Products $model */
//$this->title = 'Xem sản phẩm';

$this->title = $model->name_products;
$this->params['breadcrumbs'][] = ['label' => 'Quản lý sản phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>



<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_products' => $model->id_products], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_products' => $model->id_products], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


<!-- header -->
<nav class="navbar navbar-expand-md navbar-white sticky-top bg-white">
        <div class="container">
            
        </div>
    </nav>
    <!-- end header -->

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4">
            <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="card">
                <div class="container-fliud">
                    <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                        action="/php/twig/frontend/giohang/themvaogiohang">
                        <input type="hidden" name="sp_ma" id="sp_ma" value="5">
                        <input type="hidden" name="sp_ten" id="sp_ten" value="Samsung Galaxy Tab 10.1 3G 16G">
                        <input type="hidden" name="sp_gia" id="sp_gia" value="10990000.00">
                        <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="samsung-galaxy-tab-10.jpg">

                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane" id="pic-1">
                                        <img src="../assets/img/product/samsung-galaxy-tab-10.jpg">
                                    </div>
                                    <div class="tab-pane" id="pic-2">
                                        <img src="../assets/img/product/samsung-galaxy-tab.jpg">
                                    </div>
                                    <div class="tab-pane active" id="pic-3">
                                        <img src="../assets/img/product/samsung-galaxy-tab-4.jpg">
                                    </div>
                                </div>
                                <ul class="preview-thumbnail nav nav-tabs">
                                    <li class="active">
                                        <a data-target="#pic-1" data-toggle="tab" class="">
                                            <img src="../assets/img/product/samsung-galaxy-tab-10.jpg">
                                        </a>
                                    </li>
                                    <li class="">
                                        <a data-target="#pic-2" data-toggle="tab" class="">
                                            <img src="../assets/img/product/samsung-galaxy-tab.jpg">
                                        </a>
                                    </li>
                                    <li class="">
                                        <a data-target="#pic-3" data-toggle="tab" class="active">
                                            <img src="../assets/img/product/samsung-galaxy-tab-4.jpg">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title">Thông tin sản phẩm</h3>
                                
                                <p class="product-description">Màn hình 10.1 inch cảm ứng đa điểm</p>
                                <small class="text-muted">Giá cũ: <s><span>10,990,000.00 vnđ</span></s></small>
                                <h4 class="price">Giá hiện tại: <span>10,990,000.00 vnđ</span></h4>

                                <h4 class="name-product">Tên sản phẩm: <span>10,990,000.00 vnđ</span></h4>

                                <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                    <strong>Uy
                                        tín</strong>!</p>
                                <h5 class="sizes">sizes:
                                    <span class="size" data-toggle="tooltip" title="cỡ Nhỏ">s</span>
                                    <span class="size" data-toggle="tooltip" title="cỡ Trung bình">m</span>
                                    <span class="size" data-toggle="tooltip" title="cỡ Lớn">l</span>
                                    <span class="size" data-toggle="tooltip" title="cỡ Đại">xl</span>
                                </h5>
                                <h5 class="colors">colors:
                                    <span class="color orange not-available" data-toggle="tooltip"
                                        title="Hết hàng"></span>
                                    <span class="color green"></span>
                                    <span class="color blue"></span>
                                </h5>
                                <div class="form-group">
                                    <label for="soluong">Số lượng đặt mua:</label>
                                    <input type="number" class="form-control" id="soluong" name="soluong">
                                </div>
                                <div class="action">
                                    <a class="add-to-cart btn btn-default" id="btnThemVaoGioHang">Thêm vào giỏ hàng</a>
                                    <a class="like btn btn-default" href="#"><span class="fa fa-heart"></span></a>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End block content -->
    </main>

   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popperjs/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom script - Các file js do mình tự viết -->
    <script src="../assets/js/app.js"></script>

    


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_products',
            'name_products',
            'description',
            'status',
            'id_category',
            //'image',
            [
                'attribute' => 'image',
                'format' => 'html',             
                'value' => function($model) {
                    return Html::img('../../uploads/'.$model['image'], ['width'=>'150']);
                }
                
            ],
            //'files',
            [
                //'label' => 'anh',
                'attribute' => 'files',
                'format' => 'raw',
                'value' => $this->render('view360', ['model' => $model]),
                'contentOptions' => ['style' => 'width:150px; height:150px;'],
            ],
            //'qr_code',
            [
                'attribute' => 'qr_code',
                'format' => 'html',
                'value' => function($model) {
                    return Html::img('../../qr/'.$model['qr_code'], ['width'=>'150']);
                }
            ],
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?> 

</div>
