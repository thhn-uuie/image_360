<?php
namespace common\helper;
use yii\web\UploadedFile;


class ImageHelper {
    public function loadImgProducts($model, $param, $path) {
        $dir = '../../image' . $path . '/';
//        mkdir($dir,0777, true);
        if ($param) {
            $param->saveAs($dir . time() . '_' . $param->name);
            $model->image = time() . '_' . $param->name;
        }
    }


    public function updateImage($model, $param, $path) {
        $old_image = $model->image;
        if($param){
            $dir = '../../image' . $path . '/';
            $param->saveAs($dir . time() . '_' . $param->name);
            unlink($dir . $model->image);
            $model->image = time() . '_' . $model->file_image->name;

        } else {
            $param = $old_image;
        }
    }

    public function loadImgAvatar($model) {
        $model->file_image = UploadedFile::getInstance($model, 'file_image');
        if ($model->file_image) {
            $model->file_image->saveAs('../../image/avatars/' . time() . '_' . $model->file_image->name);
            $model->avatar = time() . '_' . $model->file_image->name;
        }
    }
}