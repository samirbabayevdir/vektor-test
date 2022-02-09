<?php

namespace frontend\controllers;

use common\models\Category;
use yii\web\Controller;
use yii\web\Response;
use Yii;

/**
 * Sitemap controller
 */
class SitemapController extends Controller
{
  public function actionIndex()
  {
    $arr = array();

    $categs = Category::find()->all(); // Опрашиваем модель Blog все ее записи со статусом 1 (включено)

    foreach ($categs as $categ) {
      $arr[] = array(
        'loc' => '/' . $categ->id, // Ссылка
        'priority' => '0.80', // Приоритет
      );
    }

    // Отправляем данные на отображение без шаблона
    $xml_array = $this->renderPartial('index');

    Yii::$app->response->format = Response::FORMAT_RAW;
    $headers = Yii::$app->response->headers;
    $headers->add('Content-Type', 'text/xml'); // Устанавливаем заголовок страницы

    return $xml_array;
  }
}
