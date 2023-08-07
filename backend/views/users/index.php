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
    <div class="card border-info mb-3" style="border-color: #ec4d4d!important;">
        <div class="card-header">
            <div class="col-md-10" style="font-size: 35px; font-weight:bold">
                <?= Html::encode($this->title) ?>
            </div>

        </div>

        <div class="card-body text-dark">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => 'Hiển thị <strong>{begin}-{end}</strong> tài khoản của <strong>{totalCount}</strong> tài khoản',

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
                        'content' => function ($model) {
                            if ($model->id_role == 1) {
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
                        'attribute' => 'created_at',
                        'content' => function ($model) {
                            return date('d-m-Y h:i:s', $model->created_at);
                        }
                    ],
                    'created_by',
                    [
                        'attribute' => 'updated_at',
                        'content' => function ($model) {
                            return date('d-m-Y h:i:s', $model->created_at);
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
    </div>
</div>
