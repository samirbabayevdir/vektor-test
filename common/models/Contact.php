<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $number
 * @property string|null $address
 * @property string|null $info
 * @property string|null $whatsapp
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $linkedin
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'number'], 'string', 'max' => 256],
            [['address', 'info', 'whatsapp', 'facebook', 'instagram', 'linkedin'], 'string', 'max' => 2000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'number' => 'Number',
            'address' => 'Address',
            'info' => 'Info',
            'whatsapp' => 'Whatsapp',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'linkedin' => 'Linkedin',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ContactQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ContactQuery(get_called_class());
    }
}
