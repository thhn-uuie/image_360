<?php

use yii\helpers\Url;

?>

<div class="panel-group category-products" id="accordian">
    <?php if ($cate): ?>
        <?php foreach ($cate as $item) : ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a href="<?= Url::toRoute(['products/products-category', 'id_cate' => $item->id_category]) ?>">
                            <?php echo $item->name_category ?>
                        </a>
                    </h4>
                </div>

            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

