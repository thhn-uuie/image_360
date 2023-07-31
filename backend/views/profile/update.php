<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */

$this->title = 'Cập nhật hồ sơ: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Hồ sơ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id_user' => $model->id_user]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
