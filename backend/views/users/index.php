<?php

use common\models\base\Users;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\UsersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Danh sách các tài khoản';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?php //= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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

            //'id_user',
            'username',
            //'password',
            'email:email',
            [
                'attribute' => 'id_role',
                'content' => function($model) {
                        if ($model -> id_role == 1) {
                            return '<span class="badge rounded-pill bg-primary" style="font-size: 12px;">Admin</span>';
                        } else {
                            return '<span class="badge rounded-pill text-bg-secondary" style="font-size: 12px;">User</span>';
                        }
                },
                'headerOptions' => [
                    'style' => 'text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:100px;text-align:center'
                ],

            ],
            [
                'attribute' => 'created_at' ,
                'content' => function($model) {
                    return date('d-m-Y', $model->created_at);
                }
            ],
            'created_by',
            [
                'attribute' => 'updated_at',
                'content' => function($model) {
                    return date('d-m-Y', $model->created_at);
                }
            ],
            'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Users $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_user' => $model->id_user]);
                 }
            ],
        ],
    ]); ?>


</div>
