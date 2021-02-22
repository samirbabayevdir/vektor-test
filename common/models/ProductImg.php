<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_img".
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $image
 *
 * @property Product $product
 */
class ProductImg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_img';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id'], 'integer'],
            [['image'], 'image', 'extensions' => ['jpg', 'jpeg', 'png', 'webp'], 'skipOnEmpty' => false, 'maxFiles' => 5],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'image' => 'Image',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ProductQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ProductImgQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProductImgQuery(get_called_class());
    }
}
