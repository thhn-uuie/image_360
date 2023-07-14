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
          <legend><?php echo $model->username?></legend>
          <div class="item" style="margin-bottom: 20px;">
            <label for="activity" style="margin-right:10px;" >Email: </label>
            <div>
                <?php echo $model->username?>
            </div>
          </div>
          <div class="item">
            <label for="fee" style="margin-right:10px;">Chức năng:</label>
            <div>
                <?php echo $model->id_role?>
            </div>
          </div>
                   <div class="item">
            
            
          </div>
            <fieldset>
            <div class="colums">
            <div class="item">
                <label for="fname" style="margin-right:10px;"> Thời gian tạo: </label>
                <div>
                    <?php echo $model->created_at?>
                </div>
            </div>
            <div class="item">
                <label for="lname" style="margin-right:10px;"> Người tạo: </label>
                <div>
                    <?php echo $model->created_by?>
                </div>
            </div> 
            <div class="item">
                <label for="address1" style="margin-right:10px;"> Thời gian cập nhật: </label>
                <div>
                    <?php echo $model->updated_at?>
                </div>
            </div>
            <div class="item">
                <label for="address2" style="margin-right:10px;">Người cập nhật: </label>
                <div>
                    <?php echo $model->created_by?>
                </div>
            </div>
                <div class="question">        
                </div>
            </div>
                    </fieldset>
            </div>
      </form>
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
