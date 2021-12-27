<?php

namespace frontend\controllers;

use common\models\About;
use common\models\Category;
use common\models\Contact;
use common\models\MetaPages;
use common\models\Product;
use common\models\Response;
use frontend\base\BaseController;
use Yii;
use yii\helpers\Html;
use yii\web\Cookie;

/**
 * Site controller
 */
class MainController extends BaseController
{
  public function actions()
  {
    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ],
    ];
  }

  public function actionIndex()
  {
    $headCategs = Category::find()->where(['parent_id' => 0])->all();
    $about = About::find()->all();
    // $model = Ca::find()->all();
    $meta = MetaPages::find()->andWhere('name' == 'home')->one();

    $this->setMeta(@$meta->title, @$meta->description);
    return $this->render('index', ['headCategs' => $headCategs, 'about' => $about]);
  }

  public function actionMain()
  {
    $headCategs = Category::find()->where(['parent_id' => 0])->all();

    return $this->render('main', ['headCategs' => $headCategs]);
  }

  public function actionCategories()
  {
    $id = Yii::$app->request->get('id');
    $headCateg   = Category::findOne(['id' => $id]);

    if (empty($headCateg)) {
      throw new \yii\web\HttpException(404, 'Belə Kateqoriya Yoxdur');
    }

    $this->setMeta($headCateg->translation['name'], $headCateg->description);
    $childCategs = Category::find()->andWhere(['parent_id' => $id])->all();
    $bannerCateg = $this->getTopBanner($id);
    $links       = $this->getLinks($id);

    if (!$childCategs) {

      $products = Product::find()->andWhere(['category_id' => $id])->all();

      return $this->render('products', [
        'headCateg' => $headCateg,
        'bannerCateg' => $bannerCateg,
        'links' => $links,
        'products' => $products,
      ]);
    }

    return $this->render('categories', [
      'headCateg' => $headCateg,
      'childCategs' => $childCategs,
      'links' => $links,
      'bannerCateg' => $bannerCateg,
    ]);
  }

  public function actionProduct()
  {
    $id = Yii::$app->request->get('id');
    $product = Product::findOne(['id' => $id]);

    if (empty($product)) {
      throw new \yii\web\HttpException(404, 'Belə Məhsul Yoxdur');
    }

    $headCategId = Yii::$app->request->get('headCateg');
    $headCateg   = Category::findOne(['id' => $headCategId]);

    if (empty($headCateg)) {
      throw new \yii\web\HttpException(404, 'Belə Məhsul Yoxdur');
    }

    $bannerCateg = $this->getTopBanner($headCategId);

    $links       = $this->getLinks($headCateg['id']);

    $this->setMeta($product->name, $product->description);

    return $this->render('product', [
      'product' => $product,
      'headCateg' => $headCateg,
      'bannerCateg' => $bannerCateg,
      'links' => $links,
    ]);
  }

  public function actionAbout()
  {
    $about = About::find()->all();

    $meta = MetaPages::find()->andWhere('name' == 'about')->one();

    $this->setMeta(@$meta->title, @$meta->description);

    return $this->render('about', ['about' => $about]);
  }

  public function actionContact()
  {
    $contact = Contact::find()->all();
    $about = About::find()->all();

    $meta = MetaPages::find()->andWhere('name' == 'contact')->one();

    $this->setMeta(@$meta->title, @$meta->description);

    $response = new Response();

    if ($response->load(Yii::$app->request->post()) && $response->save()) {
      return $this->redirect(['contact']);
    }


    return $this->render(
      'contact',
      [
        'contact' => $contact,
        'about' => $about,
        'response' => $response,
      ]
    );
  }

  public function actionLanguage()
  {
    $language = Yii::$app->request->post('language');
    Yii::$app->language = $language;

    $languageCookie = new Cookie(
      [
        'name' => 'language',
        'value' => $language,
        'expire' => time() + 60 * 60 * 24 * 30,
      ]
    );

    Yii::$app->response->cookies->add($languageCookie);
    return $this->redirect(Yii::$app->request->referrer);
  }

  public function getLinks($id)
  {
    $categ = Category::findOne(['id' => $id]);
    if ($id == 0) {
      return Html::a('<i class="fas fa-arrow-down"></i>' . Yii::t('samba', 'Categories'), \yii\helpers\Url::to(['/main/main']),) . '<span> / </span>';
    }
    return
      Html::a('<i class="fas fa-arrow-down"></i>' . $categ->translation['name'], '/categories/' . $id, ['style' => 'order: ' . $id . ';']) . '<span style="order: ' . $id . '" > / </span>' .
      $this->getLinks($categ['parent_id']);
  }
  protected function getTopBanner($id)
  {
    $categ = Category::findOne(['id' => $id]);
    if ($categ['parent_id'] == 0) {
      return $categ;
    }
    return $this->getTopBanner($categ['parent_id']);
  }
}
