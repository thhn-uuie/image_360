<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\base\Users $model */

$this->title = 'Tạo tài khoản mới';
$this->params['breadcrumbs'][] = ['label' => 'Tài khoản', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
