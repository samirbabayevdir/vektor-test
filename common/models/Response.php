<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

use Yii;

/**
 * This is the model class for table "response".
 *
 * @property int $id
 * @property int|null $created_at
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $message
 */
class Response extends \yii\db\ActiveRecord
{
    public $reCaptcha;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'response';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator2::className()],
            [['created_at'], 'integer'],
            [['message'], 'string'],
            [['name', 'surname', 'email', 'phone'], 'string', 'max' => 255],
            [['name', 'surname', 'email', 'phone', 'message'], 'required', 'message' => '{attribute}, boş ola bilməz'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Göndərilmə Zamanı',
            'name' => \Yii::t('samba', 'Name'),
            'surname' => \Yii::t('samba', 'Surname'),
            'email' => \Yii::t('samba', 'Email'),
            'phone' => \Yii::t('samba', 'Phone'),
            'message' => \Yii::t('samba', 'Message'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ResponseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ResponseQuery(get_called_class());
    }
}
