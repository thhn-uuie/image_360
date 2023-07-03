<?php
namespace common\models;

class Products extends \common\models\base\Products {
    public $fileImg;
    /**
     * {@inheritdoc}
     */
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
            [['created_at', 'updated_at'], 'safe'],
            [['name_products', 'description', 'status', 'image', 'files', 'qr_code', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['qr_code'], 'unique'],
            [['fileImg', 'file']], //tu them
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['id_category' => 'id_category']],
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
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
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

    /**
     * Gets query for [[Rate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRate()
    {
        return $this->hasOne(Rate::class, ['id_products' => 'id_products']);
    }

    /**
     * Gets query for [[View]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getView()
    {
        return $this->hasOne(View::class, ['id_products' => 'id_products']);
    }
}
