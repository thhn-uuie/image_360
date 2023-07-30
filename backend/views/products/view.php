<?php

use yii\helpers\Html;
use yii\helpers\Url;


/** @var yii\web\View $this */
/** @var common\models\Products $model */

$this->title = $model->name_products;
$this->params['breadcrumbs'][] = ['label' => 'Quản lý sản phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<head>
    <link rel="stylesheet" href="../views/products/css/upload-img.scss" type="text/css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <link rel="stylesheet" href="../views/products/css/view-css.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="../views/products/css/view360-css.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="product-views">
    </div>
    <p>
        <?= Html::a('Cập nhật', ['update', 'id_products' => $model->id_products], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id_products' => $model->id_products], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="card">
        <div class="row">
            <div class="col-md-5">
                <!-- Upload image -->

                <img
                        class="show-image-products" width="250px" height="300px"
                        src="<?php echo '../../image/products' . '/' . $model->image ?>">
                <div class="grid-container">
                    <div class="col">
                        <div class="start-btn-container">
                            <div class="start-btn">
                                <button type="button" class="btn btn-outline-success" style="font-size: 12px">QR Code
                                </button>
                            </div>
                        </div>

                        <div class="center modal-box">
                            <div class="fas fa-times"></div>
                            <div class="form">
                                <img class="qr-code" width="250px" height="250px"
                                     src="<?php echo '../../qr/' . $model->qr_code ?>">
                            </div>
                        </div>
                        <script>
                            $(document).ready(function () {
                                $('.start-btn').click(function () {
                                    $('.modal-box').toggleClass("show-modal");
                                    $('.start-btn').toggleClass("show-modal");
                                });
                                $('.fa-times').click(function () {
                                    var pop = $(this).closest(".modal-box");
                                    pop.toggleClass("show-modal");
                                    $('.start-btn').toggleClass("show-modal");
                                    event.stopPropagation();
                                });
                            });
                        </script>
                    </div>
                    <div class="col">
                        <div class="start-btn-360">
                            <button type="button" class="btn btn-outline-warning"
                                    style="font-size: 12px; color: brown; border: 1px solid brown">Ảnh 360
                            </button>
                        </div>

                        <div class="center modal-box-360">
                            <div class="fas fa-times"></div>
                            <div class="form360">
                                <?php echo $this->render('view360', ['model' => $model]) ?>

                            </div>
                        </div>
                        <script>
                            $(document).ready(function () {
                                $('.start-btn-360').click(function () {
                                    $('.modal-box-360').toggleClass("show-modal-360");
                                    $('.start-btn-360').toggleClass("show-modal-360");
                                });
                                $('.fa-times').click(function () {
                                    var popup = $(this).closest(".modal-box-360");
                                    popup.toggleClass("show-modal-360");
                                    $('.start-btn-360').toggleClass("show-modal-360");
                                    event.stopPropagation();
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class=" col-md-7">
                <div class="p-3 py-5">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4
                                style="font-size: 40px; font-weight: bold"><?php echo $model->name_products ?></h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-11"><label class="labels">Mô tả sản phẩm</label>
                            <p style="font-size: 15px"><?php echo $model->description ?></p></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Trạng thái</label>
                            <p style="font-size: 15px"><?php echo $model->status ?></p></div>
                        <div class="col-md-12"><label class="labels">Danh mục sản phẩm</label>
                            <p style="font-size: 15px"><?php echo $model->category->name_category ?></p></div>
                        <div class="col-md-6"><label class="labels">Thời gian tạo sản phẩm</label>
                            <p style="font-size: 15px"><?php echo date('d-m-Y h:i:s', $model->created_at) ?></p></div>
                        <div class="col-md-6"><label class="labels">Người tạo sản phẩm</label>
                            <p style="font-size: 15px"><?php echo $model->created_by ?></p></div>
                        <div class="col-md-6"><label class="labels">Thời gian cập nhật</label>
                            <p style="font-size: 15px"><?php echo date('d-m-Y h:i:s', $model->updated_at) ?></p></div>
                        <div class="col-md-6"><label class="labels">Người cập nhật</label>
                            <p style="font-size: 15px"><?php echo $model->updated_by ?></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End block content -->
    </main>

</div>




