<?php

/** @var yii\web\View $this */

use common\models\Products;
use common\models\base\View;
use yii\db\Query;

$this->title = 'Dashboard';
?>
<head>

    <link id="pagestyle" href="../web/site/argon-dashboard.css?v=2.0.4" rel="stylesheet"/>

    <link rel="stylesheet" href="../web/site/dashboard.css" type="text/css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>


    <style>

        .card-header-chart {
            height: 50px !important;
            background-color: #144d4a !important;
        }

        .card-header-chart p {
            color: #fff;
            font-size: 18px;
            text-align: center;
            margin-top: 14px;
        }

        .card-body-chart {
            border: 2px solid #144d4a !important;
            height: calc(100% - 40px) !important;
        }

        .chartBox {
            width: 100%;
            height: calc(100% - 40px);


        }
    .numbers {
        margin-left: 17px;
    }

    </style>
</>
<?php if (!Yii::$app->user->isGuest): ?>

    <div class="card--container">
        <div class="row">
            <?php if (Yii::$app->user->identity->id_role == 1): ?>

                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card" id="card-view">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold"> Tài khoản được tạo</p>
                                        <h5 class="font-weight-bolder">
                                            <?php echo count(\common\models\User::find()->all()) ?>
                                        </h5>
                                        <p class="mb-0">
                                            <span class="text-success text-sm font-weight-bolder">Admin: </span>
                                            <?php echo count(\common\models\User::find()->where(['id_role' => '1'])->all()) ?>
                                            <br>
                                            <span class="text-success text-sm font-weight-bolder">User: </span>

                                            <?php echo count(\common\models\User::find()->where(['id_role' => '2'])->all()) ?>
                                        </p>

                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="fa fa-user text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card" id="card-view">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-9">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Tổng số ảnh 360</p>
                                    <h5 class="font-weight-bolder">
                                        <?php if (Yii::$app->user->identity->id_role == 1): ?>
                                            <?php echo count(Products::find()->all()); ?>
                                        <?php else: ?>
                                            <?php echo count(Products::find()->where(['created_by' => Yii::$app->user->identity->username])->all()); ?>
                                        <?php endif; ?>
                                    </h5>
                                    <p class="mb-0">
                                        <?php if (Yii::$app->user->identity->id_role == 1): ?>
                                            <span class="text-success text-sm font-weight-bolder">Hoạt động:</span>
                                            <?php echo count(\common\models\Products::find()->where(['status' => 'Hoạt động'])->all()) ?>
                                            <br>
                                            <span class="text-danger text-sm font-weight-bolder">Không hoạt động:</span>
                                            <?php echo count(\common\models\Products::find()->where(['status' => 'Không hoạt động'])->all()) ?>
                                        <?php else: ?>
                                            <span class="text-success text-sm font-weight-bolder">Hoạt động:</span>
                                            <?php echo count(\common\models\Products::find()->where(['status' => 'Hoạt động', 'created_by' => Yii::$app->user->identity->username])->all()) ?>
                                            <br>
                                            <span class="text-danger text-sm font-weight-bolder">Không hoạt động:</span>
                                            <?php echo count(\common\models\Products::find()->where(['status' => 'Không hoạt động', 'created_by' => Yii::$app->user->identity->username])->all()) ?>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="fa fa-product-hunt text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card" id="card-view">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-9">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Tổng danh mục</p>
                                    <h5 class="font-weight-bolder">
                                        <?php if (Yii::$app->user->identity->id_role == 1): ?>
                                            <?php echo count(\common\models\Categories::find()->all()); ?>
                                        <?php else: ?>
                                            <?php echo count(\common\models\Categories::find()->where(['created_by' => Yii::$app->user->identity->username])->all()); ?>
                                        <?php endif; ?>
                                    </h5>
                                    <p class="mb-0">
                                        <?php if (Yii::$app->user->identity->id_role == 1): ?>
                                            <span class="text-success text-sm font-weight-bolder">Hoạt động:</span>
                                            <?php echo count(\common\models\Categories::find()->where(['status' => 'Hiện'])->all()) ?>
                                            <br>
                                            <span class="text-danger text-sm font-weight-bolder">Không hoạt động:</span>
                                            <?php echo count(\common\models\Categories::find()->where(['status' => 'Ẩn'])->all()) ?>
                                        <?php else: ?>
                                            <span class="text-success text-sm font-weight-bolder">Hoạt động:</span>
                                            <?php echo count(\common\models\Categories::find()->where(['status' => 'Hiện', 'created_by' => Yii::$app->user->identity->username])->all()) ?>
                                            <br>
                                            <span class="text-danger text-sm font-weight-bolder">Không hoạt động:</span>
                                            <?php echo count(\common\models\Categories::find()->where(['status' => 'Ẩn', 'created_by' => Yii::$app->user->identity->username])->all()) ?>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="fa fa-list text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (Yii::$app->user->identity->id_role == 2): ?>
                <div class="col-xl-4 col-sm-6">
                    <div class="card" id="card-view">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Ảnh được Yêu thích</p>
                                        <h5 class="font-weight-bolder">
                                            <?php $product_by = Products::find()->where(['status' => 'Hoạt động', 'created_by' => Yii::$app->user->identity->username])->all();
                                            $wish_count = 0;
                                            foreach ($product_by as $item) {
                                                $wish_count += \common\models\base\Wishlist::find()
                                                    ->where(['id_products' => $item->id_products])
                                                    ->groupBy(['id_products'])
                                                    ->count();
                                            }
                                            echo $wish_count;
                                            ?>
                                        </h5>
                                        <p class="mb-0">
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                            <br>
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                            <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <i class="fa fa-heart text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4" style="margin-top: 25px;">
                    <div class="card-header-chart">
                        <p>10 sản phẩm có lượt xem nhiều nhất</p>
                    </div>
                    <div class="card-body-chart">
                        <div class="chartBox">
                            <canvas id="topView"></canvas>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-6">
                <div class="card mb-4" style="margin-top: 25px;">
                    <div class="card-header-chart">
                        <p>10 sản phẩm có lượt đánh giá cao nhất</p>
                    </div>
                    <div class="card-body-chart">
                        <div class="chartBox">
                            <canvas id="topRate"></canvas>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
<?php endif; ?>
<?php


$query = new Query();

if (Yii::$app->user->identity->id_role == 1) {
    $topViewedProducts = Products::find()
        ->orderBy(['view.view_count' => SORT_DESC])
        ->joinWith('view')
        ->limit(10)
        ->all();

    $query->select(['products.name_products', 'AVG(rate) AS average_rating'])
        ->from('rate')
        ->innerJoin('products', 'rate.id_products = products.id_products')
        ->groupBy('rate.id_products')
        ->orderBy(['average_rating' => SORT_DESC])
        ->limit(10);

} else {
    $topViewedProducts = Products::find()
        ->where(['created_by' => Yii::$app->user->identity->username])
        ->orderBy(['view.view_count' => SORT_DESC])
        ->joinWith('view')
        ->limit(10)
        ->all();


    $query->select(['products.name_products', 'AVG(rate) AS average_rating'])
        ->from('rate')
        ->innerJoin('products', 'rate.id_products = products.id_products')
        ->where(['products.created_by' => Yii::$app->user->identity->username]) // Thay $userId bằng ID của người dùng cụ thể
        ->groupBy('rate.id_products')
        ->orderBy(['average_rating' => SORT_DESC])
        ->limit(10);

}
//Top Rate
$topRateProducts = $query->all();
$rateNameProducts = [];
$rateStarProducts = [];
for ($i = 0; $i < count($topRateProducts); $i++) {
    array_push($rateNameProducts, $topRateProducts[$i]['name_products']);
    array_push($rateStarProducts, $topRateProducts[$i]['average_rating']);
}

//Top View
$nameProducts = [];
$viewProducts = [];
foreach ($topViewedProducts as $product) {
    array_push($nameProducts, $product->name_products);
    if (View::findOne(['id_products' => $product->id_products]) !== null) {
        array_push($viewProducts, $product->view->view_count);
    }
}


?>
<script>
    // Top 10 View
    // setup
    const data = {
        labels: <?php echo json_encode($nameProducts); ?>,
        datasets: [{
            label: 'Lượt view',
            data: <?php echo json_encode($viewProducts); ?>,
            backgroundColor: [
                'rgba(255, 26, 104, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(0, 0, 0, 0.2)'
            ],
            borderColor: [
                'rgba(255, 26, 104, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1
        }]
    };

    // config
    const config = {
        type: 'bar',
        data,
        options: {
            aspectRatio: 1,
            indexAxis: 'y',
        }
    };

    // render init block
    const topView = new Chart(
        document.getElementById('topView'),
        config
    );


    // Top 10 Rate
    const dataRate = {
        labels: <?php echo json_encode($rateNameProducts); ?>,
        datasets: [{
            label: 'Đánh giá sản phẩm',
            data: <?php echo json_encode($rateStarProducts); ?>,
            backgroundColor: [
                'rgba(255, 26, 104, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(0, 0, 0, 0.2)'
            ],
            borderColor: [
                'rgba(255, 26, 104, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1
        }]
    };

    // config
    const configRate = {
        type: 'bar',
        data: dataRate,
        options: {
            aspectRatio: 1,
            indexAxis: 'y',
        }
    };

    // render init block
    const topRate = new Chart(
        document.getElementById('topRate'),
        configRate
    );


    // Instantly assign Chart.js version
    const chartVersion = document.getElementById('chartVersion');
    // chartVersion.innerText = Chart.version;
</script>

</body>
