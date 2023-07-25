<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Categories $model */

$this->title = $model->id_category;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="categories-view">

  <div class="d-flex justify-content-center container mt-5">
    <div class="card p-3 bg-white"><i class="fa fa-apple"></i>
      <div class="about-product text-center mt-2">
        <<img style="margin-top: -27px; margin-left: -9px; border-radius: -20%; margin-bottom: 16px;" class="element"
          width="700px" height="300px" src="<?php echo '../../image/category' . '/' . $model->image ?>">
          <div>

            <h4>Danh mục:</h4>
            <h6 class="mt-0 text-black-50">
              <div>
                <span class="name_category">
                  <?php echo $model->name_category ?>
                </span>
              </div>
            </h6>
          </div>
      </div>



      <div class="colums">
        <div class="item">
          <label for="fname" style="margin-right:10px; margin-top: 7px;"> Thời gian tạo: </label>
          <div>
            <?php echo $model->created_at ?>
          </div>
        </div>
        <div class="item">
          <label for="lname" style="margin-right:10px;margin-left: 25px;margin-top: 7px;"> Người tạo: </label>
          <div>
            <?php echo $model->created_by ?>
          </div>
        </div>
        <div class="item">
          <label for="address1" style="margin-right:10px;margin-top: 7px;"> Thời gian cập nhật: </label>
          <div>
            <?php echo $model->updated_at ?>
          </div>
        </div>
        <div class="item">
          <label for="address2" style="margin-right:10px;margin-left: 25px;margin-top: 7px;">Người cập nhật: </label>
          <div>
            <?php echo $model->created_by ?>
          </div>
        </div>
        <div class="question">
        </div>
      </div>
    </div>
  </div>
</div>
</div>



<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="../views/categories/css/view_custom.css">
</head>


<div class="testbox">

  <div style="text-align: center;">

    <?= Html::a('Cập nhật', ['update', 'id_category' => $model->id_category], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Xóa', ['delete', 'id_category' => $model->id_category], [
      'class' => 'btn btn-danger',
      'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
      ],
    ]) ?>
  </div>
</div>
</div>