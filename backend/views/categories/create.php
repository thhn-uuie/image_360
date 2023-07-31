<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Categories $model */

$this->title = 'Tạo mới danh mục';
$this->params['breadcrumbs'][] = ['label' => 'Danh mục', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
