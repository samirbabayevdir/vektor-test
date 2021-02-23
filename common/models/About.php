<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "about".
 *
 * @property int $id
 * @property string|null $description_one
 * @property string|null $description_two
 * @property string|null $image
 * @property string|null $image_banner
 */
class About extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $image_bannerFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_one', 'description_two'], 'string'],
            [['image'], 'string', 'max' => 2000],
            [['image_banner'], 'string', 'max' => 200],
            [['imageFile'], 'file', 'extensions' => 'png, jpg, jpeg, webp, svg'],
            [['image_bannerFile'], 'image', 'extensions' => 'png, jpg, jpeg, webp, svg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'description_one' => Yii::t('app', 'Description One'),
            'description_two' => Yii::t('app', 'Description Two'),
            'image' => Yii::t('app', 'Image'),
            'image_banner' => Yii::t('app', 'Image Banner'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AboutQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AboutQuery(get_called_class());
    }

    public function getAboutI18ns()
    {
        return $this->hasMany(AboutI18n::className(), ['fk_ref' => 'id']);
    }


    public function getTranslation()
    {
        $lang = \Yii::$app->request->getPreferredLanguage();
        $transtation = $this->hasOne(AboutI18n::classname(), ['fk_ref' => 'id'])->onCondition(['lang' => $lang])->one();

        return @$transtation ?: $this;
    }

    public function save($runValidation = true, $attributeNames = null)
    {

        if ($this->imageFile) {
            $this->image = '/about/' .
                Yii::$app->security->generateRandomString(32) .
                '/' .
                $this->imageFile->name;
        }
        if ($this->image_bannerFile) {
            $this->image_banner = '/about_banner/' .
                Yii::$app->security->generateRandomString(32) .
                '/' .
                $this->image_bannerFile->name;
        }
        $transaction = Yii::$app->db->beginTransaction();
        $ok = parent::save($runValidation, $attributeNames);

        if ($ok && $this->imageFile) {
            $fullPath = Yii::getAlias('@frontend/web/storage' . $this->image);
            $dir = dirname($fullPath);
            if (!FileHelper::createDirectory($dir) || !$this->imageFile->saveAs($fullPath)) {
                $transaction->rollBack();
                return false;
            }
        }
        if ($ok && $this->image_bannerFile) {
            $fullPath = Yii::getAlias('@frontend/web/storage' . $this->image_banner);
            $dir = dirname($fullPath);
            if (!FileHelper::createDirectory($dir) | !$this->image_bannerFile->saveAs($fullPath)) {
                $transaction->rollBack();
                return false;
            }
        }
        $transaction->commit();
        return $ok;
    }

    public function getImageUrl()
    {
        if (!$this->image) {
            return Yii::$app->params['frontendUrl'] . '/img/no-image.png';
        }
        return Yii::$app->params['frontendUrl'] . '/storage' . $this->image;
    }
    public function getImage_bannerUrl()
    {
        if (!$this->image_banner) {
            return Yii::$app->params['frontendUrl'] . '/img/no-image.png';
        }
        return Yii::$app->params['frontendUrl'] . '/storage' . $this->image_banner;
    }
}
