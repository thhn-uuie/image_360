<?php

use yii\helpers\Url;
use frontend\widgets\categoryWidget;
use frontend\widgets\allProductsWidget;
use frontend\widgets\recommendedWidget;
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục</h2>

                    <!-- Start show categories -->
                        <?= categoryWidget::widget();?>
                    <!-- End show categories-->



                </div>
            </div>

    <!-- Start show all products-->
        <?= allProductsWidget::widget();?>
    <!-- End show all products-->
        </div>
    </div>
</section>


</div>

</div>
</div>

