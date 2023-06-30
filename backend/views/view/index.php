<?php

use common\models\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\ViewSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Views';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="view-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create View', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_view',
            'id_products',
            'count',
            'date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, View $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_view' => $model->id_view]);
                 }
            ],
        ],
    ]); ?>


</div>
