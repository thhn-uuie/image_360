<?php

/** @var yii\web\View $this */

use common\models\Products;
use common\models\base\View;
use yii\db\Query;

$this->title = 'Dashboard';
?>


<head>
    <link rel="stylesheet" href="../views/site/css/dashboard.css" type="text/css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>


    <style>

        .card-header {
            height: 50px !important;
            background-color: #144d4a !important;
        }

        .card-header p {
            color: #fff;
            font-size: 18px;
            text-align: center
        }

        .card-body {
            border: 2px solid #144d4a !important;
            height: calc(100% - 40px) !important;
        }

        .chartCard {
            width: 100%;
            height: calc(100% - 40px);
            display: grid;
            grid-template-columns: repeat(3, 1fr);

        }


    </style>
</head>
<body>
<?php if (!Yii::$app->user->isGuest): ?>

<div class="card--container">
    <h3 class="main--title"></h3>
    <div class="card--wrapper">

        <?php
        if (Yii::$app->user->identity->id_role == 1):
            ?>
            <div class="first-card">
                <div class="card--header">
                    <div class="content-first-card">
                        <span class="title"> Tài khoản được tạo </span>
                        <span class="first-value">
                        <?php echo count(\common\models\User::find()->all()) ?>
                    </span>
                    </div>
                    <i class="fa fa-user icon-dash"></i>
                </div>
                <span class="card-detail">
                <p>Admin: <?php echo count(\common\models\User::find()->where(['id_role' => '1'])->all()) ?></p>
                <p>User: <?php echo count(\common\models\User::find()->where(['id_role' => '2'])->all()) ?></p>
            </span>
            </div>
        <?php endif; ?>

        <div class="first-card">
            <div class="card--header">
                <div class="content-first-card">
                    <span class="title"> Tổng sản phẩm </span>
                    <span class="first-value">
                        <?php echo count(Products::find()->all()); ?>
                    </span>
                </div>
                <i class="fa fa-product-hunt icon-dash"></i>
            </div>
            <span class="card-detail-products">
                <p class="active-prd"> Đang hoạt động: <?php echo count(\common\models\Products::find()->where(['status' => 'Hoạt động'])->all()) ?> </p>
                <p class="noactive">Không hoạt động: <?php echo count(\common\models\Products::find()->where(['status' => 'Không hoạt động'])->all()) ?></p>
            </span>
        </div>

        <div class="first-card">
            <div class="card--header">
                <div class="content-first-card">
                    <span class="title"> Tổng danh mục </span>
                    <span class="first-value">
                        <?php echo count(\common\models\Categories::find()->all()) ?>
                    </span>
                </div>
                <i class="fa fa-list icon-dash"></i>
            </div>
            <span class="card-detail-products">
                <p> Đang hoạt động: <?php echo count(\common\models\Categories::find()->where(['status' => 'Hiện'])->all()) ?> </p>
                <p>Không hoạt động: <?php echo count(\common\models\Categories::find()->where(['status' => 'Ẩn'])->all()) ?></p>
            </span>
        </div>
    </div>

    <div class="row" style="margin-top: 15px">

        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <p>Những sản phẩm có lượt xem nhiều nhất</p>
                </div>
                <div class="card-body">
                    <div class="chartBox">
                        <canvas id="topView"></canvas>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <p>Những sản phẩm có lượt đánh giá cao nhất</p>
                </div>
                <div class="card-body">
                    <div class="chartBox">
                        <canvas id="topRate"></canvas>
                    </div>
                </div>

            </div>
        </div>

    </div>
<?php endif;?>
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
        if (View::findOne(['id_products'=>$product->id_products]) !== null) {
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
        chartVersion.innerText = Chart.version;
    </script>

</body>
</html>