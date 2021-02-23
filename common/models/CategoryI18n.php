<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category_i18n".
 *
 * @property int $id
 * @property int|null $fk_ref
 * @property string|null $lang
 * @property string|null $name
 *
 * @property Category $fkRef
 */
class CategoryI18n extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_i18n';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_ref'], 'integer'],
            [['lang'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 2000],
            [['fk_ref'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['fk_ref' => 'id']],
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
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * Gets query for [[FkRef]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CategoryQuery
     */
    public function getFkRef()
    {
        return $this->hasOne(Category::className(), ['id' => 'fk_ref']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CategoryI18nQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CategoryI18nQuery(get_called_class());
    }
}
