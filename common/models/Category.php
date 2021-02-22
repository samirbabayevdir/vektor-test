<?php

namespace common\models;

use yii\helpers\FileHelper;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string|null $image
 * @property string|null $image_banner
 * @property int $status
 * @property string|null $keywords
 * @property string|null $description
 *
 * @property CategoryI18n[] $categoryI18ns
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $image_bannerFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'name', 'status'], 'required'],
            [['parent_id', 'status'], 'integer'],
            [['keywords', 'description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['image', 'image_banner'], 'string', 'max' => 2000],
            [['imageFile'], 'image', 'extensions' => 'png, jpg, jpeg, webp'],
            [['image_bannerFile'], 'image', 'extensions' => 'png, jpg, jpeg, webp'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' =>  'ID',
            'parent_id' =>  'Parent ID',
            'name' =>  'Name',
            'image' =>  'Image',
            'image_banner' =>  'Image Banner',
            'status' =>  'Status',
            'keywords' =>  'Keywords',
            'description' =>  'Description',
        ];
    }

    /**
     * Gets query for [[CategoryI18ns]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CategoryI18nQuery
     */
    // public function getCategoryI18ns()
    // {
    //     return $this->hasMany(CategoryI18n::className(), ['fk_ref' => 'id']);
    // }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ProductQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CategoryQuery(get_called_class());
    }

    public function save($runValidation = true, $attributeNames = null)
    {

        if ($this->imageFile) {
            $this->image = '/category/' .
                Yii::$app->security->generateRandomString(32) .
                '/' .
                $this->imageFile->name;
        }
        if ($this->image_bannerFile) {
            $this->image_banner = '/category_banner/' .
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
