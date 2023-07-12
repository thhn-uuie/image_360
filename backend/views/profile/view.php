<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_user' => $model->id_user], ['class' => 'btn btn-primary']) ?>
        <?php if (Yii::$app->user->identity->id_role==1):?>
            <?= Html::a('Delete', ['delete', 'id_user' => $model->id_user], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?php endif;?>
    </p>

<?php $user_name = \common\models\User::find()
    ->select('users.username')
    ->join('JOIN', 'profile', 'users.id_user = profile.id_user')
    ->scalar();
?>


    <style>
       .labels {
            font-size: 16px;
           color: #1f1f1f;
        }
       .text-right{
           color: #E86A33;
           font-weight: bold;
           font-size: 40px;
           text-align: center;
           margin: 0 150px ;
       }

    </style>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-5 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="300px"
                         src="<?php echo '../../avatar/'.$model->avatar ?>">
                    <span class="font-weight-bold"
                          style="margin-top: 40px; font-size:30px; color: #E86A33">
                        <?php echo $user_name?>
                    </span>
                    <span> </span>
                </div>
            </div>
            <div class="col-md-7 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Họ tên</label><p style="font-size: 15px"><?php echo $model->name?></p></div>
                        <div class="col-md-6"><label class="labels">Giới tính</label><p style="font-size: 15px"><?php echo $model->gender?></p></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Ngày sinh</label><p style="font-size: 15px"><?php echo $model->birthday?></p></div>
                        <div class="col-md-6"><label class="labels">Email</label><p style="font-size: 15px"><?php echo $model->enmail?></p></div>
                        <div class="col-md-6"><label class="labels">Điện thoại</label><p style="font-size: 15px"><?php echo $model->phone?></p></div>
                        <div class="col-md-12"><label class="labels">Địa chỉ</label><p style="font-size: 15px"><?php echo $model->address?></p></div>
                        <div class="col-md-6"><label class="labels">Thời gian tạo profile</label><p style="font-size: 15px"><?php echo $model->created_at?></p></div>
                        <div class="col-md-6"><label class="labels">Người tạo profile</label><p style="font-size: 15px"><?php echo $model->created_by?></p></div>
                        <div class="col-md-6"><label class="labels">Thời gian cập nhật profile</label><p style="font-size: 15px"><?php echo $model->updated_at?></p></div>
                        <div class="col-md-6"><label class="labels">Người cập nhật profile</label><p style="font-size: 15px"><?php echo $model->updated_by?></p></div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!---->
<!--    --><?php //= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            [
//                'attribute' => 'avatar',
//                'label' =>'',
//                'format' => 'html',
//                'value' => Html::img('../../avatar/'.$model['avatar'], ['class'=>'imgAvatar','width'=>'150'])
//
//            ],
//            'name',
//            'birthday',
//            'gender',
//            'enmail',
//            'phone',
//            'address',
//            'created_at',
//            'created_by',
//            'updated_at',
//            'updated_by',
//
//        ],
//    ]) ?>

</div>
