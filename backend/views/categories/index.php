<?php

use common\models\Categories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\CategoriesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Quản lí danh mục';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <p>
        <?= Html::a('Tạo mới danh mục', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_category',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($model) {
                        return Html::img('../../image/category/' . $model['image'], ['width' => '100', 'height' => '100']);
                    },
            ],
            'name_category',
            // 'status',
            [
                'attribute' => 'status',
                'content' => function ($model) {
                    if ($model->status == 'Hiện') {
                        return '<span class="badge bg-success" style="font-size: 12px;">Hiện</span>';
                    } else {
                        return '<span class="badge bg-danger" style="font-size: 12px;">Ẩn</span>';
                    }
                },
                'headerOptions' => [
                    'style' => 'width:150px;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:150px;text-align:center'
                ],
            ],
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, \common\models\base\Categories $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id_category' => $model->id_category]);
                    }
            ],
        ],
    
    ]); ?>
</div>