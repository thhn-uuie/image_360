<?php
namespace common\models;

class Products extends \common\models\base\Products {
    public $file_image;

    public function rules()
    {
       
        return [
            [['name_products', 'description', 'status', 'image', 'files', 'qr_code'], 'required'],
            [['id_category'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_products', 'description', 'status', 'image', 'files', 'qr_code', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['qr_code'], 'unique'],
            ['file_image','file','extensions'=>'jpg,pnf'],

            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['id_category' => 'id_category']],
        ];
    }
}