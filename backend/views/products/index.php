<?php

use common\models\base\Products;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use zxing\yii2\qrcode\QRCode;

// //tạo đối tượng qrcode
// $qr_code = new QRCode();

// //tạo mã qr chứa url 
// $url='http://localhost/image_360/backend/web/index.php?r=products%2Fview&id_products=48';
// $qr_code->setText($url);

// //lấy đối tượng mã qr
// $qrcodeImage = $qr_code->getQRCodeImage();

// //hiển thị mã qr
// echo '<img src="' . $qrcodeImage . '">';
/** @var yii\web\View $this */
/** @var common\models\search\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_products',
            'name_products',
            'description',
            'status',
            'id_category',
            //'image:image',
            [
                'attribute' => 'image',
                'format' => 'html',             
                   'value' => function($model) {
                    return Html::img('../../uploads/'.$model['image'], ['width'=>'150']);
                },
                
            ],
            'files',
            // 'qr_code',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Products $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_products' => $model->id_products]);
                 }
            ],
        ],
    ]); ?>


</div>
