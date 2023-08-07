<?php

use common\models\Profile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\ProfileSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Hồ sơ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <div class="card border-info mb-3" >
        <div class="card-header">
            <div class="col-md-10" style="font-size: 35px; font-weight:bold">
                <?= Html::encode($this->title) ?>
            </div>

        </div>

        <div class="card-body text-dark">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => 'Hiển thị <strong>{begin}-{end}</strong> hồ sơ của <strong>{totalCount}</strong> hồ sơ',
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

                    [
                        'attribute' => 'avatar',
                        'format' => 'html',
                        'value' => function ($model) {
                            $profile_id_user = Profile::findOne(['id_user' => Yii::$app->user->identity->id_user]);
                            if (Yii::$app->user->identity->getId() == $profile_id_user->id_user) {

                                return Html::img('../../image/avatars/' . $model['avatar'], ['class' => 'imgAvatar', 'width' => '100', 'height' => '100']);
                            }
                        },
                        'headerOptions' => [
                            'style' => 'width:150px;text-align:center'
                        ],
                        'contentOptions' => [
                            'style' => 'width:150px;text-align:center'
                        ],
                        'filter'=>false,
                    ],

                    [
                        'attribute' => 'name',
                        'headerOptions' => [
                            'style' => 'width:200px;text-align:center'
                        ],
                        'contentOptions' => [
                            'style' => 'width:230px;text-align:center'
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
                        'attribute' => 'email',
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
                    [
                        'attribute' => 'created_at',
                        'content' => function ($model) {
                            return date('d-m-Y h:i:s', $model->created_at);
                        },
                        'headerOptions' => [
                            'style' => 'width:150px;text-align:center'
                        ],
                        'contentOptions' => [
                            'style' => 'width:150px;text-align:center'
                        ],
                    ],
                    //'created_by',
                    [
                        'attribute' => 'updated_at',
                        'content' => function ($model) {
                            return date('d-m-Y h:i:s', $model->updated_at);
                        },
                        'headerOptions' => [
                            'style' => 'width:150px;text-align:center'
                        ],
                        'contentOptions' => [
                            'style' => 'width:150px;text-align:center'
                        ],
                    ],
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
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <style>
        .imgAvatar{
            border-radius:50%;
            width:70px;
            height: 70px;
            border: 2px solid #d7ce00;
        }
    </style>


</div>
