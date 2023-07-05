<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_user' => $model->id_user], ['class' => 'btn btn-primary']) ?>
        <?php if (Yii::$app->user->identity->id_role==1):?>
            <?= Html::a('Delete', ['delete', 'id_user' => $model->id_user], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?php endif;?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_user',
            'name',
            'birthday',
            'gender',
            'enmail',
            'phone',
            'address',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            [
                'attribute' => 'avatar',
                'format' => 'html',             
                'value' => Html::img('../../avatar/'.$model['avatar'], ['width'=>'150'])
                
            ],
        ],
    ]) ?>

</div>
