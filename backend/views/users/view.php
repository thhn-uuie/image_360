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




  <style>
    .form-control {
      margin-left: 40px;
      width: 69%;
    }

    .username {
      font-size: 36px;
      font-weight: bold;
      color: #0a4d37;
    }

    body {
      margin: auto;
      background: #eaeaea;
      font-family: 'Open Sans', sans-serif;
    }

    .info p {
      text-align: center;
      color: #999;
      text-transform: none;
      font-weight: 600;
      font-size: 15px;
      margin-top: 2px
    }

    .info i {
      color: #F6AA93;
    }

    form h1 {
      font-size: 18px;
      background: #F6AA93 none repeat scroll 0% 0%;
      color: rgb(255, 255, 255);
      padding: 22px 25px;
      border-radius: 5px 5px 0px 0px;
      margin: auto;
      text-shadow: none;
      text-align: left
    }

    form {
      border-radius: 5px;
      max-width: 700px;
      width: 100%;
      margin: 5% auto;
      background-color: #FFFFFF;
      overflow: hidden;
      margin-top: -4%;
    }

    p span {
      color: #F00;
    }

    p {
      margin: 0px;
      font-weight: 500;
      line-height: 2;
      color: #333;
    }

    h1 {
      text-align: center;
      color: #666;
      text-shadow: 1px 1px 0px #FFF;
      margin: 50px 0px 0px 0px
    }

    input {
      border-radius: 0px 5px 5px 0px;
      border: 1px solid #eee;
      margin-bottom: 15px;
      width: 75%;
      height: 40px;
      float: left;
      padding: 0px 15px;
    }

    a {
      text-decoration: inherit
    }

    textarea {
      border-radius: 0px 5px 5px 0px;
      border: 1px solid #EEE;
      margin: 0;
      width: 75%;
      height: 130px;
      float: left;
      padding: 0px 15px;
    }

    .form-group {
      overflow: hidden;
      clear: both;
    }

    .icon-case {
      width: 35px;
      float: left;
      border-radius: 5px 0px 0px 5px;
      background: #eeeeee;
      height: 42px;
      position: relative;
      text-align: center;
      line-height: 40px;
    }

    i {
      color: #555;
    }

    .contentform {
      padding: 40px 30px;
    }

    .bouton-contact {
      background-color: #81BDA4;
      color: #FFF;
      text-align: center;
      width: 100%;
      border: 0;
      padding: 17px 25px;
      border-radius: 0px 0px 5px 5px;
      cursor: pointer;
      margin-top: 40px;
      font-size: 18px;
    }

    .leftcontact {
      width: 49.5%;
      float: left;
      border-right: 1px dotted #CCC;
      box-sizing: border-box;
      padding: 0px 15px 0px 0px;
    }

    .rightcontact {
      width: 49.5%;
      float: right;
      box-sizing: border-box;
      padding: 0px 0px 0px 15px;
    }

    .validation {
      display: none;
      margin: 0 0 10px;
      font-weight: 400;
      font-size: 13px;
      color: #DE5959;
    }

    #sendmessage {
      border: 1px solid #fff;
      display: none;
      text-align: center;
      margin: 10px 0;
      font-weight: 600;
      margin-bottom: 30px;
      background-color: #EBF6E0;
      color: #5F9025;
      border: 1px solid #B3DC82;
      padding: 13px 40px 13px 18px;
      border-radius: 3px;
      box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.03);
    }

    #sendmessage.show,
    .show {
      display: block;
    }
  </style>