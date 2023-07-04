<?php
namespace common\helper;
use yii\web\UploadedFile;


class ImageHelper {
    public function loadImgProducts($model) {
        $model->file_image = UploadedFile::getInstance($model, 'file_image');
        if ($model->file_image) {
            $model->file_image->saveAs('../../uploads/' . $model->file_image->name);
            $model->image = $model->file_image->name;
        }
    }

    public function loadImgAvatar($model) {
        $model->file_image = UploadedFile::getInstance($model, 'file_image');
        if ($model->file_image) {
            $model->file_image->saveAs('../../avatar/' . $model->file_image->name);
            $model->avatar = $model->file_image->name;
        }
    }
}