<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="container">
    <div class="heading_container heading_center">
        <h2>
            Hình ảnh mới nhất
        </h2>
    </div>

    <?php $limitShowProducts = array_slice($products,count($products) - 8, 8);
    if ($limitShowProducts): ?>
        <div class="row">
            <?php for ($item = 0; $item < count($limitShowProducts); $item++): ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <a href="<?= Url::toRoute(['products/detail', 'id_products' => $limitShowProducts[$item]->id_products]) ?>">
                            <div class="img-box">
                                <img src="<?php echo '../../image/products/' . $limitShowProducts[$item]->image; ?>" alt="">
                            </div>
                            <div class="detail-box">
                                <h6 style="margin: auto">
                                    <?php echo $limitShowProducts[$item]->name_products; ?>
                                </h6>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    <?php endif; ?>

    <div class="btn-box">
        <?php echo Html::a('Xem tất cả ảnh', ['/categories/categories'], ['class' => 'btn-box']) ?>

    </div>
</div>