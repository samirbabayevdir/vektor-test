<?php

namespace common\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $keywords
 * @property int $status
 *
 * @property Category $category
 * @property ProductImg[] $productImgs
 * @property ImgsUrl[] $imgsurl
 * @property FormImgsUrl[] $formimgsurl
 */
class Product extends \yii\db\ActiveRecord
{
    public $images;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'status'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['description', 'keywords'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['images'], 'safe'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Kateqoriya',
            'name' => 'Ad',
            'description' => 'İnfo',
            'keywords' => 'Keywords',
            'status' => 'Status',
            'images' => 'Fotolar',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CategoryQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[ProductImgs]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ProductImgQuery
     */
    public function getProductImgs()
    {
        return $this->hasMany(ProductImg::className(), ['product_id' => 'id']);
    }


    public function getProductI18ns()
    {
        return $this->hasMany(ProductI18n::className(), ['fk_ref' => 'id']);
    }


    public function getTranslation()
    {
        $lang = \Yii::$app->request->getPreferredLanguage();
        $transtation = $this->hasOne(ProductI18n::classname(), ['fk_ref' => 'id'])->onCondition(['lang' => $lang])->one();

        return @$transtation ?: $this;
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProductQuery(get_called_class());
    }


    public function getImgsUrl()
    {
        $all = [];

        if (!$this->productImgs) {
            array_push($all, Yii::$app->params['frontendUrl'] . '/img/no-image.png');
        }
        foreach ($this->productImgs as $img) {
            array_push($all,  Yii::$app->params['frontendUrl'] . '/storage/products/' . $img['image']);
        }
        return $all;
    }

    public function getFormImgsUrl()
    {
        $all = [];

        if (!$this->productImgs) {
            array_push($all, Yii::$app->params['frontendUrl'] . '/img/no-image.png');
        }
        foreach ($this->productImgs as $img) {
            array_push($all,  [Yii::$app->params['frontendUrl'] . '/storage/products/' . $img['image'], $img->id]);
        }
        return $all;
    }
}
