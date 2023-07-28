<?php


/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>products/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>


<h1><?= Html::encode($this->title) ?></h1>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_product',
]) ?>