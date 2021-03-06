<?php

namespace frontend\base;

use common\models\Contact;
use yii\web\Controller;

class BaseController extends Controller
{
  public function beforeAction($action)
  {
    $this->view->params['facebook'] = empty(Contact::find()->all()[0]['facebook']) ? '' : Contact::find()->all()[0]['facebook'];
    $this->view->params['instagram'] = empty(Contact::find()->all()[0]['instagram']) ? '' : Contact::find()->all()[0]['instagram'];
    $this->view->params['whatsapp'] = empty(Contact::find()->all()[0]['whatsapp']) ? '' : Contact::find()->all()[0]['whatsapp'];
    $this->view->params['number'] = empty(Contact::find()->all()[0]['number']) ? '' : Contact::find()->all()[0]['number'];
    $this->view->params['email'] = empty(Contact::find()->all()[0]['email']) ? '' : Contact::find()->all()[0]['email'];
    $this->view->params['address'] = empty(Contact::find()->all()[0]->translation['address']) ? '' : Contact::find()->all()[0]->translation['address'];
    $this->view->params['info'] = empty(Contact::find()->all()[0]->translation['info']) ? '' : Contact::find()->all()[0]->translation['info'];
    $this->view->params['linkedin'] = empty(Contact::find()->all()[0]['linkedin']) ? '' : Contact::find()->all()[0]['linkedin'];



    return parent::beforeAction($action);
  }


  protected function setMeta($title = null, $description = null)
  {
    $this->view->registerMetaTag(['name' => 'title', 'content' => "$title"]);
    $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
  }
}
