<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "about_i18n".
 *
 * @property int $id
 * @property int|null $fk_ref
 * @property string|null $lang
 * @property string|null $description_one
 * @property string|null $description_two
 *
 * @property About $fkRef
 */
class AboutI18n extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about_i18n';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_ref'], 'integer'],
            [['description_one', 'description_two'], 'string'],
            [['lang'], 'string', 'max' => 255],
            [['fk_ref'], 'exist', 'skipOnError' => true, 'targetClass' => About::className(), 'targetAttribute' => ['fk_ref' => 'id']],
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
            'description_one' => Yii::t('app', 'Description One'),
            'description_two' => Yii::t('app', 'Description Two'),
        ];
    }

    /**
     * Gets query for [[FkRef]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AboutQuery
     */
    public function getFkRef()
    {
        return $this->hasOne(About::className(), ['id' => 'fk_ref']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AboutI18nQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AboutI18nQuery(get_called_class());
    }
}
