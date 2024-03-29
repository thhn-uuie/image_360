<?php

use yii\helpers\Html;
use common\models\base\Categories;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Products $model */

$form = ActiveForm::begin();

$this->title = 'Tạo sản phẩm mới';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý sản phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

