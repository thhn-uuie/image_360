<?php
namespace common\helper;
use yii\web\UploadedFile;


class ImageHelper {
    public function loadImgProducts($model, $param, $path) {
        //$param = UploadedFile::getInstance($model, 'file_image');
        if ($param) {
            $param->saveAs($path . time() . '_' . $param->name);
            $model->image = time() . '_' . $param->name;
        }
    }

    public function loadImgAvatar($model) {
        $model->file_image = UploadedFile::getInstance($model, 'file_image');
        if ($model->file_image) {
            $model->file_image->saveAs('../../avatar/' . time() . '_' . $model->file_image->name);
            $model->avatar = time() . '_' . $model->file_image->name;
        }
    }
}