<?php

use common\models\Rate;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\RateSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Rates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_rate',
            'id_products',
            'id_user',
            'comment',
            'rate',
            //'time',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Rate $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_rate' => $model->id_rate]);
                 }
            ],
        ],
    ]); ?>


</div>
