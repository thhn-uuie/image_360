<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
?>


<section class="ftco-section">
    <div class="container">

        <div class="row justify-content-center" style="margin-top:5%">
            <div class="col-md-10">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <div class="contact-wrap w-100 p-lg-5 p-4" style="background: #ffeeee; border-radius:5%; border:1px solid brown">
                                <h3 class="mb-4">Gửi lời nhắn</h3>
                                <div id="form-message-warning" class="mb-4"></div>
                                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
<!--                                <div id="form-message-success" class="mb-4">-->
<!--                                    Your message was sent, thank you!-->
<!--                                </div>-->
                                <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>


<!--                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">-->
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?= $form->field($model, 'email') ?>


                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?= $form->field($model, 'subject') ?>


                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?= Html::submitButton('Gửi', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="info-wrap w-100 p-lg-5 p-4 img">
                                <h3>Liên hệ</h3>
                                <p class="mb-4">Có thể liên hệ với chúng tôi bằng những cách dưới đây:</p>
                                <div class="dbox w-100 d-flex align-items-start">
                                    <div class="icon d-flex align-items-center justify-content-center" style="margin-top:5px">
                                        <span class="fa fa-map-marker"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Địa chỉ:</span> 334 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
                                    </div>
                                </div>
<!--                                <div class="dbox w-100 d-flex align-items-center">-->
<!--                                    <div class="icon d-flex align-items-center justify-content-center">-->
<!--                                        <span class="fa fa-phone"></span>-->
<!--                                    </div>-->
<!--                                    <div class="text pl-3">-->
<!--                                        <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-paper-plane"></span>
                                    </div>
                                    <div class="text pl-3" style="margin-top:10px;">
                                        <p><span>Email:</span> <a href="mailto:nguyenthithuhien_t65@hus.edu.vn">nguyenthithuhien_t65@hus.edu.vn</a></p>
                                    </div>
                                </div>
<!--                                <div class="dbox w-100 d-flex align-items-center">-->
<!--                                    <div class="icon d-flex align-items-center justify-content-center">-->
<!--                                        <span class="fa fa-globe"></span>-->
<!--                                    </div>-->
<!--                                    <div class="text pl-3">-->
<!--                                        <p><span>Website</span> <a href="#">yoursite.com</a></p>-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


