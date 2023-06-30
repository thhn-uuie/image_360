<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id_products
 * @property string $name_products
 * @property string $description
 * @property string $status
 * @property int|null $id_category
 * @property string $image
 * @property string $files
 * @property string $qr_code
 *
 * @property Categories $category
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_products', 'description', 'status', 'image', 'files', 'qr_code'], 'required'],
            [['id_category'], 'integer'],
            [['name_products', 'description', 'status', 'image', 'files', 'qr_code'], 'string', 'max' => 255],
            [['name_products'], 'unique'],
            [['files'], 'unique'],
            ['image','string','max' => 100],
           // ['file','file', 'extension' => 'jpg,png'],
           // [['file'], 'file', 'skipOnEmpty' => true, 'extension' => 'png, jpg, jpeg'], //tự thêm
            [['qr_code'], 'unique'],
            [['id_category'], 'unique'],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(),
             'targetAttribute' => ['id_category' => 'id_category']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_products' => 'Id Products',
            'name_products' => 'Name Products',
            'description' => 'Description',
            'status' => 'Status',
            'id_category' => 'Id Category',
            'image' => 'Image',
            'files' => 'Files',
            'qr_code' => 'Qr Code',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id_category' => 'id_category']);
    }
}
