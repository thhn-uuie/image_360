<?php
use frontend\widgets\recommendedWidget;

/* Hiển thị nội dung sản phẩm */
?>

<?= recommendedWidget::widget(['productId' => $model->id_products]) ?>