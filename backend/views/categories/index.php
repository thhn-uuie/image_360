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
    <div class="card border-info mb-3" style="border-color: #ff8bf5!important;">
        <div class="card-header">
            <div class="col-md-10" style="font-size: 35px; font-weight:bold">
                <?= Html::encode($this->title) ?>
            </div>

        </div>

        <div class="card-body text-dark">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => 'Hiển thị <strong>{begin}-{end}</strong> danh mục của <strong>{totalCount}</strong> danh mục',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn',
                        'header' => 'STT',
                        'headerOptions' => [
                            'style' => 'width:10px;text-align:center'
                        ],
                        'contentOptions' => [
                            'style' => 'width:10px;text-align:center'
                        ],
                    ],

                    // 'id_category',
                    [
                        'attribute' => 'image',
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::img('../../image/category/' . $model['image'], ['width' => '150', 'height' => '150']);
                        },
                        'filter' => false,
                        'headerOptions' => [
                            'style' => 'width:150px;text-align:center'
                        ],
                        'contentOptions' => [
                            'style' => 'width:150px;text-align:center'
                        ],
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
    </div>
</div>