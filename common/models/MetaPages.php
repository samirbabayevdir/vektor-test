<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "meta_pages".
 *
 * @property int $id
 * @property string $name
 * @property string|null $title
 * @property string|null $description
 * @property string|null $keywords
 */
class MetaPages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meta_pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description', 'keywords'], 'string'],
            [['name', 'title'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Səhifə'),
            'title' => Yii::t('app', 'Başlıq'),
            'description' => Yii::t('app', 'İzah'),
            'keywords' => Yii::t('app', 'Açar Sözlər'),
        ];
    }
}
