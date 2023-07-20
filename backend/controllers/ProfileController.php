<?php

namespace backend\controllers;

use common\models\Profile;
use Yii;
use yii\web\UploadedFile;
use common\helper\ImageHelper;


class ProfileController extends \backend\controllers\base\ProfileController
{
    public function actionCreate()
    {
        $model = new Profile();
        $loadImg = new ImageHelper();
        if ($model->load(Yii::$app->request->post())) {

            $loadImg->loadImgAvatar($model);

            if ($model->save(false)) {
                //Yii::$app->session->addFlash('success', 'Thêm mới thành công');
                return $this->redirect((['view', 'id_user' => $model->id_user]));
            } else {
                //Yii::$app->session->addFlash('danger', 'Thêm mới không thành công');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

        } else {

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdate($id_user)
    {
        $model = $this->findModel($id_user);
        $old_avatar = $model->avatar;

        if ($model->load(Yii::$app->request->post())) {
            $model->file_image = UploadedFile::getInstance($model, 'file_image');
            if ($model->file_image) {
                $model->file_image->saveAs('../../image/avatars/' . time() . '_' . $model->file_image->name);
//                var_dump($model->avatar);die;
                if($model->avatar !== 'no-avatar.jpg') {
                    unlink('../../image/avatars/' . $model->avatar);
                    $model->avatar = time() . '_' . $model->file_image->name;

                } else {
                    $model->avatar = time() . '_' . $model->file_image->name;

                }

            } else {
                $model->file_image = $old_avatar;
            }
            if ($model->save(false)) {
                //Yii::$app->session->addFlash('success', 'Thêm mới thành công');
                return $this->redirect(['view', 'id_user' => $model->id_user]);
            } else {
                //Yii::$app->session->addFlash('danger', 'Thêm mới không thành công');
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionDelete($id_user)
    {
        $model = $this->findModel($id_user);
        $model->delete();
        unlink('../../image/avatars/' . $model->avatar);
        return $this->redirect(['index']);
    }
}
