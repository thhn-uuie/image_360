<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\base\Users $model */

// $this->title = $model->id_user;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

  <h1><?= Html::encode($this->title) ?></h1>

  <html>

  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../views/users/css/view_custom.css">
    <link rel="stylesheet" href="../views/users/css/button_custom.css">



  </head>

  <body>
    <div class="testbox">
      <form>
        <fieldset>
          <legend><?php echo $model->username ?></legend>
          <div class="item" style="margin-bottom: 20px;">
            <label for="activity" style="margin-right:10px;">Email: </label>
            <div>
              <?php echo $model->email ?>
            </div>
            </span>
          </div>
          <div class="d-flex justify-content-between p-price"><span>Chức năng:</span>
            <span>
              <div>
                <?php echo $model->id_role ?>
              </div>
            </span>
          </div>
    </div>
    <div class="colums">
      <div class="item">
        <label for="fname" style="margin-right:10px;"> Email: </label>
        <div>
          <?php echo $model->email ?>
        </div>
      </div>
      <div class="item">
        <label for="lname" style="margin-right:10px; margin-left: 25px;"> Chức năng: </label>
        <div>
          <?php echo $model->id_role ?>
        </div>
        <fieldset>
          <div class="colums">
            <div class="item">
              <label for="fname" style="margin-right:10px;"> Thời gian tạo: </label>
              <div>
                <?php echo date('d-m-Y h:i:s', $model->created_at) ?>
              </div>
            </div>
            <div class="item">
              <label for="lname" style="margin-right:10px;margin-left: 25px;"> Người tạo: </label>
              <div>
                <?php echo $model->created_by ?>
              </div>
            </div>
            <div class="item">
              <label for="address1" style="margin-right:10px;"> Thời gian cập nhật: </label>
              <div>
                <?php echo date('d-m-Y h:i:s', $model->updated_at) ?>
              </div>
            </div>
            <div class="item">
              <label for="address2" style="margin-right:10px;margin-left: 25px;">Người cập nhật: </label>
              <div>
                <?php echo $model->created_by ?>
              </div>
            </div>
            <div class="question">
            </div>
          </div>
        </fieldset>
      </div>
      </span>
    </div> -->

</div>

</body>

</html>

<html>
<div style="text-align: center;">

  <?= Html::a('Cập nhật', ['update', 'id_user' => $model->id_user], ['class' => 'btn btn-primary']) ?>
  <?= Html::a('Xóa', ['delete', 'id_user' => $model->id_user], [
    'class' => 'btn btn-danger',
    'data' => [
      'confirm' => 'Are you sure you want to delete this item?',
      'method' => 'post',
    ],
  ]) ?>
</div>

</html>

<!-- <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          'id_user',
          'username',
          'password',
          'email:email',
          'id_role',
          'created_at',
          'created_by',
          'updated_at',
          'updated_by',
        ],
      ]) ?> -->

</div>



<!-- <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
      integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../views/users/css/view_custom.css">
    <link rel="stylesheet" href="../views/users/css/button_custom.css">

  </head> -->

<div class="testbox">
  <!-- <form>
      <fieldset>
        <legend>
          <?php echo $model->username ?>
        </legend>
        <div class="item" style="margin-bottom: 20px;">
          <label for="activity" style="margin-right:10px;">Email: </label>
          <div>
            <?php echo $model->username ?>
          </div>
        </div>
        <div class="item">
          <label for="fee" style="margin-right:10px;">Chức năng:</label>
          <div>
            <?php echo $model->id_role ?>
          </div>
        </div>
        <div class="item">


        </div>
        <div class="colums">
          <div class="item">
            <label for="fname" style="margin-right:10px;"> Thời gian tạo: </label>
            <div>
              <?php echo $model->created_at ?>
            </div>
          </div>
          <div class="item">
            <label for="lname" style="margin-right:10px;"> Người tạo: </label>
            <div>
              <?php echo $model->created_by ?>
            </div>
          </div>
          <div class="item">
            <label for="address1" style="margin-right:10px;"> Thời gian cập nhật: </label>
            <div>
              <?php echo $model->updated_at ?>
            </div>
          </div>
          <div class="item">
            <label for="address2" style="margin-right:10px;">Người cập nhật: </label>
            <div>
              <?php echo $model->created_by ?>
            </div>
          </div>
          <div class="question">
          </div>
        </div>
      </fieldset>
  </div>
  </form> -->
</div>






<style>
  .colums {
    display: flex;
    justify-content: space-between;
    flex-direction: row;
    flex-wrap: wrap;
  }

  .colums div {
    width: 48%;
  }

  legend {
    font-size: 70px;
    color: inherit;
    font-family: Roboto;
    font-weight: bold;
    line-height: -0.8;
    letter-spacing: 2px;
  }

  legend {
    display: block;
    width: 90%;
    max-width: 106%;
    padding: -11px;
    margin-top: -0.9rem;

    margin-bottom: -0.5rem;
    font-size: 4rem;
    line-height: inherit;
    color: inherit;
    white-space: normal;
  }

  .dropdown-item {
    width: 100%;
    padding: 11px 20px;
  }

  form {
    width: 100%;
    padding: -20px;
    background: #fdfdfd;
    box-shadow: 3 0 8px #073315;
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

  .card {
    width: 627px;
    height: 200px;
  }

  body {
    background: #eee;
  }

  .bg-white {
    background: #d6f4ef !important;
    border: 1px solid #a31b1b !important;
    color: #083c73;
    margin-left: 10px;
  }
</style>


</div>