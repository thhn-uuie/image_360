<?php

use common\models\Profile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\ProfileSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <style>
        .imgAvatar{
            border-radius:50%;
            width:70px;
            height: 70px;
            border: 2px solid #d7ce00;
        }
    </style>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'header' => 'STT',
                'headerOptions' => [
                    'style' => 'width:15px;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:15px;text-align:center'
                ],
            ],

            [
                'attribute' => 'avatar',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img('../../avatar/' . $model['avatar'],  ['class'=> 'imgAvatar', 'width' => '100', 'height' => '100']);
                },
                'headerOptions' => [
                    'style' => 'width:50px;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:50px;text-align:center'
                ],
            ],

            [
                'attribute' => 'name',
                'headerOptions' => [
                    'style' => 'width:200px;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:200px;text-align:center'
                ],
            ],

            [
                'attribute' => 'birthday',
                'headerOptions' => [
                    'style' => 'width:100px;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:100px;text-align:center'
                ],
            ],
            [
                'attribute' => 'gender',
                'headerOptions' => [
                    'style' => 'width:100px;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:100px;text-align:center'
                ],
                'filter' => ['Nam' => 'Nam', 'Nữ' => 'Nữ']
            ],

            [
                'attribute' => 'enmail',
                'headerOptions' => [
                    'style' => 'width:200px;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:200px;text-align:center'
                ],
            ],


            [
                'attribute' => 'phone',
                'headerOptions' => [
                    'style' => 'width:150px;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:150px;text-align:center'
                ],
            ],

            [
                'attribute' => 'address',
                'headerOptions' => [
                    'style' => 'width:300px;text-align:center'
                ],
            ],

            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_user' => $model->id_user]);
                }
            ],
        ],
    ]); ?>


</div>
