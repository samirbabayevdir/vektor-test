<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_i18n".
 *
 * @property int $id
 * @property int|null $fk_ref
 * @property string|null $lang
 * @property string|null $description
 *
 * @property Product $fkRef
 */
class ProductI18n extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_i18n';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_ref'], 'integer'],
            [['description'], 'string'],
            [['lang'], 'string', 'max' => 255],
            [['fk_ref'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['fk_ref' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fk_ref' => Yii::t('app', 'Fk Ref'),
            'lang' => Yii::t('app', 'Lang'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * Gets query for [[FkRef]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ProductQuery
     */
    public function getFkRef()
    {
        return $this->hasOne(Product::className(), ['id' => 'fk_ref']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ProductI18nQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProductI18nQuery(get_called_class());
    }
}
