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
    $keywords = "Vektor Safety, Vektor Uniforma, Fərdi Mühafizə Vasitələri, Fərdi Qoruyucu Vasitələr, FMV, FQV, Uniforma, uniformaların satışı, xüsusi geyim, xususi geyim satisi, kaskalar, respiratorlar, İşçi geyimləri, Uniforma, təhlükəsiz, Qaz aşkarlayıcı avadanlıq, qaz aşkarlayıcı cihaz, birdəfəlik geyim, Qaynaq işləri üçün təhlükəsizlik avadanlıqları, Qaynaq işləri üçün təhlükəsizlik cihazları, Dəniz işləri üçün qoruyucu vasitələr, Yanğınsöndürənlər üçün qoruyucu vasitələr, yanğın təhlükəsizliyi vasitələri, İş aksesuarları, Gözlərin mühafizəsi, Üzün mühafizəsi, İşçi ayaqqabılar, Başın mühafizəsi, Səsqoruyucular, Tənəffüs orqanlarının mühafizəsi, Hündürlük işlərində təminat, İlk tibbi yardım vasitələri, tibbi ləvazimatlar, maye tullantılarının idarə olunması, təhlükəsizlik nişanları, Yol təhlükəsizliyinin təminatı, İşçi kombinezonlar, işçi yarımkombinezonlar, İşçi gödəkçələr, işçi şalvarlar, İşçi qış gödəkçələri, İşçi xalatlar, işçi önlüklər, İşçi jiletlər, işçi köynəklər, İşçi papaqlar, Yağmurluq geyimlər, İşçi Alt geyimləri, Mühafizəçi geyimi, İaşə işçiləri üçün geyim, Tibb işçiləri üçün geyim, Servis işçiləri üçün geyim, Reklam məqsədli geyimlər, təhükəsizlik geyimləri, təhlükəsiz işçi geyimləri, təhlükəsiz ayaqqabılar, qoruyucu işçi geyimlər, qoruyucu geyimlər, təhlükəsizlik avadanlıqları, qoruyucu əlcəklər, dəbilqələr, ayağın mühafizəsi, qoruyucu ayaqqabılar, qoruyucu eynəklər, yds botinka";
    $this->view->registerMetaTag(['name' => 'title', 'content' => "$title"]);
    $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    $this->view->registerMetaTag(['name' => 'keywords', 'content' => $keywords]);
    $this->view->registerMetaTag(['name' => 'author', 'content' => 'Vektor Safety']);
  }
}
