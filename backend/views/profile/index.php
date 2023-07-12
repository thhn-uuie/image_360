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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_user',
            'name',
            'birthday',
            'gender',
            'enmail',
            'phone',
            'address',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            [
                'attribute' => 'avatar',
                'format' => 'html',             
                   'value' => function($model) {
                    return Html::img('../../avatar/'.$model['avatar'], ['width'=>'150']);
                },
                
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_user' => $model->id_user]);
                 }
            ],
        ],
    ]); ?>


</div>
