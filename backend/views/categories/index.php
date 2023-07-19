<?php

use common\models\base\Categories;
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
        <?= Html::a('Create Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_category',
            'name_category',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($model) {
                        return Html::img('../../uploadsCategory/' . $model['image'], ['width' => '100', 'height' => '100']);
                    },
            ],
            // 'description',
               'status',
            // [
            //     'attribute' => 'status',
            //     'headerOptions' => [
            //         'style' => 'width:100px;text-align:center'
            //     ],
            //     'contentOptions' => [
            //         'style' => 'width:100px;text-align:center'
            //     ],
            //     'filter' => ['Ẩn' => 'Ẩn', 'Hiện' => 'Hiện']
            // ],
            'created_at',
            'created_by',
            //'updated_at',
            //'updated_by',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Categories $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id_category' => $model->id_category]);
                    }
            ],
        ],
    ]); ?>
</div>