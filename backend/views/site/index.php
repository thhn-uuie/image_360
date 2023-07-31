<?php

/** @var yii\web\View $this */

use common\models\Products;

$this->title = 'Dashboard';


?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div>
<div style="width: 800px;">
    <canvas id="myChart"></canvas>
</div>


<script>

    <?php

    foreach ($products as $data) {
        $productsArr[] = $data['name_products'];


        foreach ($view as $item) {
            $dataProducts[] = $item['view_count'];
        }
    }
    ?>


    const ctx = document.getElementById('myChart');


    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($productsArr)?>,
            datasets: [{
                label: 'Lượt xem',
                data: <?php echo json_encode($dataProducts)?>,
                backgroundColor: [
                    '#ff6384',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</div>

