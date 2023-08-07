<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\base\Users $model */

// $this->title = $model->id_user;
$this->params['breadcrumbs'][] = ['label' => 'Người dùng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

  <h1>
    <?= Html::encode($this->title) ?>
  </h1>


  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
      integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../views/users/css/view_custom.css">
    <link rel="stylesheet" href="../views/users/css/button_custom.css">
  </head>



  <body>
    <form>
      <h1 class="username">
        <?php echo $model->username ?>
      </h1>
      <div class="contentform">
        <div class="leftcontact">
          <div class="form-group">
            <p>E-mail </p>
            <span class="icon-case"><i class="fa fa-envelope-open"> </i></span>
            <div class="form-control" style="margin-left: 40px">
              <?php echo $model->email ?>
            </div>
            <div class="validation"></div>
          </div>

          <div class="form-group">
            <p>Người tạo </p>
            <span class="icon-case"><i class="fa fa-user-circle"></i></span>
            <div class="form-control">
              <?php echo $model->created_by ?>
            </div>
            <div class="validation"></div>
          </div>

          <div class="form-group">
            <p>Người cập nhật </p>
            <span class="icon-case"><i class="fa fa-user-circle"></i></span>
            <div class="form-control">
              <?php echo $model->updated_by ?>
            </div>
            <div class="validation"></div>
          </div>
        </div>

        <div class="rightcontact">

          <div class="form-group">
            <p>Chức năng </p>
            <span class="icon-case"><i class="fa fa-user"></i></span>
            <?php $roleName = Yii::$app->request->post('name'); ?>
            <div class="form-control">
              <?php if ($model->id_role == 1) {
                echo 'admin';
              } else if ($model->id_role == 2) {
                echo 'user';
              } ?>
            </div>
            <div class="validation"></div>
          </div>

          <div class="form-group">
            <p>Thời gian tạo </p>
            <span class="icon-case"><i class="fa fa-clock"></i></span>
            <div class="form-control">
              <?php echo $model->created_at ?>
            </div>
            <div class="validation"></div>
          </div>

          <div class="form-group">
            <p>Thời gian cập nhật </p>
            <span class="icon-case"><i class="fa fa-clock"></i></span>
            <div class="form-control">
              <?php echo $model->updated_at ?>
            </div>
            <div class="validation"></div>
          </div>
        </div>
      </div>
    </form>
  </body>





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



