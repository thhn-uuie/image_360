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

  <style>
        .category {
      font-size: 40px;
      color: inherit;
      font-family: Roboto;
      font-weight: bold;
      line-height: 1.2;
      letter-spacing: 2px;
    }

    .name_category {
      font-size: 40px;
      color: #035631;
      font-family: Roboto;
      font-weight: bold;
      line-height: 1.2;
      letter-spacing: 2px;
    }

    .dropdown-item {
      display: block;
      width: 100%;
      padding: 0.25rem 1.5rem;
      clear: both;
      font-weight: 400;
      color: #0d0d0d;
      text-align: left;
      white-space: nowrap;
      background-color: transparent;
      border: 0;
    }

    .btn-primary {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 4px;
      font-size: 20px;
      color: white;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      transition-duration: 0.1s;
      background-color: #cff2e9;
      font-family: Roboto;
      margin-left: 300px;
    }

    .btn-danger {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 4px;
      font-size: 20px;
      color: white;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      transition-duration: 0.1s;
      background-color: #e78e96;
      font-family: Roboto;
      margin-left: 10px;

    }

    fieldset {
      border: none;
      margin: 16px;
      padding: 0;
    }

    .btn-primary:hover {
      background-color: #2f9345;
    }

    .btn-primary:active {
        box-shadow: 0 0 9e9q inset #0009; 
        background-color: black;
        outline: none;
    }

    .btn-danger:hover {
      background-color: #d73b49;
    }

    .btn-danger:active {
        box-shadow: 0 0 2e2q inset #0009; 
        background-color: black;
        outline: none;
    }

    .imagePreview {
      width: 694%;
      height: 238px;
      background-position: center center;
      background: url(http://cliquecities.com/assets/no-image-e3699ae….jpg);
      background-color: #d8edd6;
      background-size: cover;
      background-repeat: no-repeat;
      display: inline-block;
      box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
    }

    .button {
      margin: -21px;

    }

    body {
      color: #131701;
      background: #E1ECC8;
      font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
      font-size: 14px;
      font-weight: 400;
      line-height: 1.471;
    }

    .dropdown-item {
      width: 100%;
      padding: 10px 20px;
    }

    form {
      width: 100%;
      padding: -20px;
      background: #fdfdfd;
      box-shadow: 3 0 8px #073315;
    }

    .colums {
      display: flex;
      justify-content: space-between;
      flex-direction: row;
      flex-wrap: wrap;
    }

    .colums div {
      width: 35%;
    }

    .item {
      display: flex;
      align-items: center;
    }

    .bg-white {
      color: #3b5570;
    }
  </style>


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



<!-- <head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="../views/categories/css/view_custom.css">



</head> -->


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