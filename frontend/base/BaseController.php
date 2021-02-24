<?php

namespace frontend\base;

use common\models\Contact;
use yii\web\Controller;

class BaseController extends Controller
{
  public function beforeAction($action)
  {
    // $this->view->params['cartItemCount'] = CartItem::find()->userId(\Yii::$app->user->id)->count();
    $this->view->params['facebook'] = Contact::find()->all()[0]['facebook'];
    $this->view->params['instagram'] = Contact::find()->all()[0]['instagram'];
    $this->view->params['whatsapp'] = Contact::find()->all()[0]['whatsapp'];
    $this->view->params['number'] = Contact::find()->all()[0]['number'];
    $this->view->params['email'] = Contact::find()->all()[0]['email'];
    $this->view->params['address'] = Contact::find()->all()[0]->translation['address'];
    $this->view->params['info'] = Contact::find()->all()[0]->translation['info'];
    $this->view->params['linkedin'] = Contact::find()->all()[0]['linkedin'];



    return parent::beforeAction($action);
  }


  protected function setMeta($title = null, $keywords = null, $description = null)
  {
    $this->view->title = $title;
    $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
    $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
  }
}
