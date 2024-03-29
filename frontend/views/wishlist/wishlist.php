<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use frontend\models\Wishlist;

?>
<head>
    <link rel="stylesheet" href="../products/css/main.css">
</head>
<div class="body-content">
    <div class="container">
        <div class="my-wishlist-page">
            <div class="row">
                <div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2" class="heading-title">Hình ảnh yêu thích</th>

                                <th colspan="2" class="count-wis" style="
                                                                    font-size: 19px;
                                                                    padding: 0;
                                                                    text-transform: none;
                                                                    ">
                                    <?= $total ?> ảnh
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <!--                            --><?php //var_dump($wis);die;?>
                            <?php foreach ($wis as $item): ?>
                                <tr>
                                    <td class="col-md-5"><img src="<?= '../../image/products/' . $item->image ?>"
                                                              alt="imga"></td>
                                    <td class="col-md-6">
                                        <div class="product-name">
                                            <a href="<?= Url::toRoute(['products/detail', 'id_products' => $item->id_products]) ?>">
                                                <?= $item->name_products ?>
                                            </a>

                                        </div>
                                        <div class="rating">
                                            <?php $query = new \yii\db\Query();
                                            $query->select(['ROUND(AVG(rate),1) AS average_rating', 'count(comment) as cmt'])
                                                ->from('rate')
                                                ->where(['id_products' => $item->id_products])
                                                ->all();
                                            $rating = $query->all();
                                            $star = $rating[0]['average_rating'];
                                            ?>
                                            <?php $fullStar = floor($star); ?>
                                            <?php for ($i = 0; $i < $fullStar; $i++): ?>
                                                <i class="fa fa-star text-warning"></i>
                                            <?php endfor; ?>


                                            <?php if (($star - $fullStar) != 0): ?>
                                                <?php $halfStar = 1; ?>
                                                <i class="fa fa-star-half-o text-warning"></i>
                                            <?php else: ?>
                                                <?php $halfStar = 0;
                                            endif; ?>

                                            <?php $emptyStar = 5 - ($fullStar + $halfStar); ?>
                                            <?php for ($st = 0; $st < $emptyStar; $st++): ?>
                                                <i class="fa fa-star text-secondary"></i>
                                            <?php endfor; ?>

                                        </div>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <a href="javascript:void(0)"
                                           onclick="deleteWL(<?= Yii::$app->user->identity->id_user ?>,<?= $item->id_products ?>)"
                                           id="delete-wis-btn" class="delete-wis-btn">
                                            <i class="fa fa-times"
                                               style="font-size:20px">
                                            </i>
                                        </a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= LinkPager::widget(['pagination' => $pagination]) ?>

                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div>
    <div style="margin-top:15px"></div>
    <?= \frontend\widgets\infoWidget::widget() ?>
</div>

<script src="../../frontend/web/products/js/jquery-1.11.1.min.js"></script>
<script src="../../frontend/web/products/js/bootstrap.min.js"></script>
<script src="../../frontend/web/products/js/scripts.js"></script>

<script>
    function deleteWL(user, id) {
        $.get('<?= Url::toRoute(['wishlist/delete'])?>', {'id': id}, function (data) {
            if (data == 1) {
                alert('Xóa thành công');
                location.reload();
            }
        });
    }
</script>
</script>

