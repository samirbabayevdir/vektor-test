<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_i18n".
 *
 * @property int $id
 * @property int|null $fk_ref
 * @property string|null $lang
 * @property string|null $address
 * @property string|null $info
 *
 * @property Contact $fkRef
 */
class ContactI18n extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_i18n';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_ref'], 'integer'],
            [['info'], 'string'],
            [['lang'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 2000],
            [['fk_ref'], 'exist', 'skipOnError' => true, 'targetClass' => Contact::className(), 'targetAttribute' => ['fk_ref' => 'id']],
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
            'address' => Yii::t('app', 'Address'),
            'info' => Yii::t('app', 'Info'),
        ];
    }

    /**
     * Gets query for [[FkRef]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ContactQuery
     */
    public function getFkRef()
    {
        return $this->hasOne(Contact::className(), ['id' => 'fk_ref']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ContactI18nQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ContactI18nQuery(get_called_class());
    }
}
