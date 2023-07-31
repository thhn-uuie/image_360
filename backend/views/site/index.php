<?php

/** @var yii\web\View $this */

use common\models\Products;
use common\models\base\View;

$this->title = 'Dashboard';


?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div>
    <div style="width: 70%;">
        <canvas id= 'myChart'></canvas>
        <canvas id= 'topProducts'></canvas>

    </div>



    <?php
//    $products = Product::find()
//        ->orderBy(['view_count' => SORT_DESC])
//        ->limit(10)
//        ->all();

    $dataProducts = [];
    $nameProducts = [];
    for($i = 0; $i < count($productsCate); $i++) {
        array_push($dataProducts, $productsCate[$i]['id_products']);
        array_push($nameProducts,$productsCate[$i]['name_products'] );
    }

    $viewByDb= [];
    for ($i = 0; $i < count($dataProducts); $i++) {
        if (($view = View::findOne(['id_products'=>$dataProducts[$i]])) !== null) {
            $viewCount = $view->view_count;
            array_push($viewByDb, $viewCount);
        } else {
            array_push($viewByDb, 0);
        }
    }
    ?>




    <script>
        // Setup Block
        const nameProd = <?php echo json_encode($nameProducts) ?>

        const dt = <?php echo json_encode($viewByDb) ?>;
        const data = {
            labels: nameProd,
            datasets: [{
                axis: 'y',
                label: 'Lượt xem',
                data: dt,
                backgroundColor: [
                    'rgba(255,99,132,0.2)',
                    'rgba(54,162,235,0.2)',
                    'rgba(255,206,86,0.2)',
                    'rgba(75,192,192,0.2)',
                    'rgba(153,102,255,0.2)',
                    'rgba(255,159,64,0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54,162,235,1)',
                    'rgba(255,206,86,1)',
                    'rgba(75,192,192,1)',
                    'rgba(153,102,255,1)',
                    'rgba(255,159,64,1)'
                ],
                borderWidth: 1
            }]
        };

        // Config Block
        const config = {
            type: 'bar',
            data,
            options: {
               indexAxis:'y',
            }
        };

        // Render Block
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</div>

