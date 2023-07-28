<?php

/** @var yii\web\View $this */
use common\models\Products;
$this->title = 'Dashboard';
?>
<div style="width: 500px;">
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const productsArray = [];
    <?php
    $products = Products::find()->all();
    foreach ($products as $item):
    ?>
    productsArray.push(<?php echo json_encode($item->name_products) ?>);
    <?php endforeach;?>
    const ctx = document.getElementById('myChart');

    const chartLabels = [];
    for (let i = 0; i < productsArray.length; i++) {
        chartLabels.push(productsArray[i]);
    }
    console.log(chartLabels);
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: chartLabels,
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
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
