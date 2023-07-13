<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\base\Categories $model */

$this->title = $model->id_category;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="categories-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../views/categories/css/view_custom.css">



  </head>
  <body>
    <div class="testbox">
      <form>
        <fieldset>
          <div class="item" style="margin-bottom: 20px;">
            <label for="activity" style="margin-right:10px;" class="category"> Danh mục: </label>
            <div>
            <span class="name_category"><?php echo $model->name_category?></span>
            </div>

            
          </div>
          <div class="item" style="margin-bottom: 20px;">
            <label for="activity" style="margin-right:10px;" > Mô tả: </label>
            <div>
            <span ><?php echo $model->description?></span>
            </div>

            
          </div>
          <div>
            <label for="activity" style="margin-right:10px;margin-bottom:10px;" >Thời gian tạo: </label>
            <div>
                <?php echo $model->created_at?>
            </div>
          </div>

          <div>
            <label for="activity" style="margin-right:10px;margin-bottom:10px;" > Người tạo: </label>
            <div>
                <?php echo $model->created_at?>
            </div>
          </div>

          <div>
            <label for="activity" style="margin-right:10px; margin-bottom:10px;" > Thời gian cập nhật: </label>
            <div>
                <?php echo $model->created_at?>
            </div>
          </div>

          <div>
            <label for="activity" style="margin-right:10px;margin-bottom:10px;" > Người cập nhật: </label>
            <div>
                <?php echo $model->created_at?>
            </div>
          </div>
          
          </div>
            
            </div>
      </form>
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
  </body>
</html>

    

    <style>
      .category{
        font-size: 40px;
        color: inherit;
        font-family: Roboto;
        font-weight: bold;
        line-height: 1.2;
        letter-spacing: 2px;
      }
      .name_category{
        font-size: 40px;
        color: #035631;
        font-family: Roboto;
        font-weight: bold;
        line-height: 1.2;
        letter-spacing: 2px;
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
        background-color: #57d699;
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


    </style>

    <!-- <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_category',
            'name_category',
            'description',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?> -->

</div>
