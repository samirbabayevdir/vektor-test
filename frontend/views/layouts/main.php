<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;;

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);

$info = empty($this->params['info']) ? '' : $this->params['info'];
$number = empty($this->params['number'])  ? '' : $this->params['number'];
$email = empty($this->params['email']) ? '' : $this->params['email'];
$address = empty($this->params['address'])  ? '' : $this->params['address'];

$facebook = empty($this->params['facebook']) ? '' : $this->params['facebook'];
$instagram = empty($this->params['instagram'])  ? '' : $this->params['instagram'];
$whatsapp = empty($this->params['whatsapp']) ? '' : $this->params['whatsapp'];
$linkedin = empty($this->params['linkedin'])  ? '' : $this->params['linkedin'];



?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" translate="no">

<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="google" value="notranslate">
  <?php $this->registerCsrfMetaTags() ?>
  <title>Vektor Uniforma | <?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
  <link rel="icon" href="/images/Vektor-V.svg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

</head>

<body>
  <?php $this->beginBody() ?>
  <div class="header__bg"></div>
  <div class="header__top">
    <div class="container__full">
      <div class="header__top-inner">
        <ul class="socials">
          <li><?= $whatsapp ? '<a target="_blank" href="' . $whatsapp . '" class="whatsapp pt-1"><i class="fab fa-whatsapp"></i></a>' : '' ?><a class="number px-4"><?= $number ?></a></li>
          <li><a href="<?= Url::to(['/main/contact']) ?>" class="contact"><?= Yii::t('samba', 'Contact Us'); ?></a></li>
          <li><a href="<?= Url::to(['/main/about']) ?>" class="about"><?= Yii::t('samba', 'About'); ?></a></li>
          <?= $facebook ? '<li><a target="_blank" href="' . $facebook . '" class="facebook"><i class="fab fa-facebook-f"></i></a></li>' : '' ?>
          <?= $instagram ? '<li><a target="_blank" href="' . $instagram . '" class="instagram"><i class="fab fa-instagram"></i></a></li>' : '' ?>
          <?= $linkedin ? '<li><a target="_blank" href="' . $linkedin . '" class="linkedin"><i class="fab fa-linkedin"></i></a></li>' : '' ?>
          <li>
            <?= Html::beginForm(['/main/language'], 'post', ['class' => 'language__form']) ?>
            <?= Html::dropDownList('language', Yii::$app->language, ['az' => 'AZ', 'ru-RU' => 'RU', 'en-US' => 'EN'], ['onchange' => 'this.form.submit()']) ?>
            <?= Html::endForm() ?>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <header class="header">
    <div class="container__full">
      <div class="header__body">
        <a href="<?= Url::to(['/']) ?>" class="header__logo">
          <?= Html::img('/images/Vektor-VEKTOR.svg', ['alt' => 'Vektor Uniforma - Logo']) ?>
          <div class="header__logo-text">Unİforma</div>
        </a>
        <div class="header__burger">
          <span></span>
        </div>
        <nav class="header__menu">
          <ul class="header__list mobile__acc">
            <div class="row categories__header">
              <h2></h2>
            </div>
            <?= \common\widgets\MenuWidget::widget(['tpl' => 'menu']) ?>
            <div class="row categories__header">
              <h2></h2>
            </div>
            <li><a href="<?= Url::to(['/main/about']) ?>"><?= Yii::t('samba', 'About'); ?></a></li>
            <li><a href="<?= Url::to(['/main/contact']) ?>"><?= Yii::t('samba', 'Contact Us'); ?></a></li>
            <div class="row categories__header mt-4">
              <h2></h2>
            </div>
            <div class="socials pt-2">
              <?= $facebook ? '<li class="d-flex align-items-center" ><a class="d-flex align-items-center"  target="_blank" href="' . $facebook . '" class="facebook"><i class="fab fa-facebook-f"></i></a></li>' : '' ?>
              <?= $instagram ? '<li class="d-flex align-items-center" ><a class="d-flex align-items-center"  target="_blank" href="' . $instagram . '" class="instagram"><i class="fab fa-instagram"></i></a></li>' : '' ?>
              <?= $linkedin ? '<li class="d-flex align-items-center" ><a class="d-flex align-items-center"  target="_blank" href="' . $linkedin . '" class="linkedin"><i class="fab fa-linkedin"></i></a></li>' : '' ?>
              <li class="d-flex align-items-center">
                <?= $whatsapp ? '<a target="_blank" href="' . $whatsapp . '" class="whatsapp pt-1"><i class="fab fa-whatsapp"></i></a>' : '' ?>
                <a class="number px-2"><?= $number ?></a>
              </li>
            </div>
            <div class="row categories__header mt-4">
              <h2></h2>
            </div>
            <li>
              <?= Html::beginForm(['/main/language'], 'post', ['class' => 'language__form']) ?>
              <?= Html::dropDownList('language', Yii::$app->language, ['az' => 'AZ', 'ru-RU' => 'RU', 'en-US' => 'EN'], ['onchange' => 'this.form.submit()']) ?>
              <?= Html::endForm() ?>
            </li>
          </ul>
          <ul class="dropdown__list">
            <?= \common\widgets\MenuWidget::widget(['tpl' => 'menu_laptop']) ?>
          </ul>
        </nav>
      </div>
    </div>
  </header>


  <?= $content ?>

  <footer class="footer">
    <div class="footer__top">
      <div class="container">
        <div class="row justify-content-center ">
          <div class="col-lg-6 d-flex justify-content-around">
            <div class="inner">
              <?= Html::img('/images/Vektor-VEKTOR.svg', ['alt' => 'Vektor Uniforma - Logo']) ?>
              <?= $info ?>
            </div>
          </div>
          <div class="col-lg-6 d-flex justify-content-around">
            <div class="inner">
              <p class="number"> <?= $whatsapp ? '<a target="_blank" href="' . $whatsapp . '" class="whatsapp pt-2"><i class="fab fa-whatsapp"></i></a>' : '' ?>
                <?= $number ?></p>
              <a href="<?= Url::to(['/main/contact']) ?>" class="btn__vk"><?= Yii::t('samba', 'Contact Us'); ?></a>
              <ul class="socials">
                <?= $facebook ? '<li><a target="_blank" href="' . $facebook . '" class="facebook"><i class="fab fa-facebook-f"></i></a></li>' : '' ?>
                <?= $instagram ? '<li><a target="_blank" href="' . $instagram . '" class="instagram"><i class="fab fa-instagram"></i></a></li>' : '' ?>
                <?= $linkedin ? '<li><a target="_blank" href="' . $linkedin . '" class="linkedin"><i class="fab fa-linkedin"></i></a></li>' : '' ?>
              </ul>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer__bottom">
      <div class="container">
        <div class="row text-center">
          <p>&copy;
            <script>
              function getYear() {
                var time = new Date();
                var year = time.getFullYear();
                document.write(year);
              }
              getYear();
            </script> <?= Yii::t('samba', '| VEKTOR UNİFORMA | All Rights Reserved | Developed by') ?> <a href="https://www.behance.net/yuzminay">SAM-BA</a>
          </p>
        </div>
      </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
  </footer>
  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>