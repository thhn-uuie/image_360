<?php
namespace common\helper;
use yii\web\UploadedFile;


class File360Helper
{
    public function loadFile360($model, $param, $path)
    {
        $dir = '../../image' . $path . '/';
//        mkdir($dir, 0777, true);
        if ($param) {
            $param->saveAs($dir . time() . '_' . $param->name);
            $model->files = time() . '_' . $param->name;
        }
    }
}