<?php

namespace common\models;
use yii\helpers\Url;
use Yii;


class Categories extends \common\models\base\Categories
{

    public $file_image;

    public function rules()
    {
        return [
            [['name_category', 'description'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_category', 'description', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['name_category'], 'unique'],
            [['file_image'],'file','extensions'=>'jpg,png, jpeg'],
            [['status'], 'safe'],

        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->created_at = time();
            $this->created_by = Yii::$app->user->identity->username;
        } else {
            $this->updated_at = time();
            $this->updated_by = Yii::$app->user->identity->username;

        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}