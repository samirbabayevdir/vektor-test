<?php
$this->title = 'Haqqımızda';
?>
<section class="banner__wrapper">
  <div class="banner page banner__home">
    <div class="banner__bg" style="background-image: url(<?= empty($about[0]) ? '' : $about[0]->getImage_bannerUrl() ?>);"></div>
    <div class="container">
      <div class="row">
        <div class="banner__inner">
          <div class="banner__title">VEKTOR UNİFORMA</div>
          <h1 class="banner__title-h1"><?= \Yii::t('samba', 'About'); ?></h1>
        </div>
      </div>
    </div>
    <div class="banner__skewed-bar"></div>
  </div>
</section>
<main class="main about">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="main__about-right">
          <h2><?= \Yii::t('samba', 'ABOUT PRODUCTS'); ?></h2>
          <?= empty($about[0]->translation['description_one']) ? '' : $about[0]->translation['description_one'] ?>
          <img src="<?= empty($about[0]) ? '' : $about[0]->getImageUrl() ?>" alt="VEKTOR UNIFORMA">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="main__about-left">
          <h2>VEKTOR UNİFORMA</h2>
          <?= empty($about[0]->translation['description_two']) ? '' :  $about[0]->translation['description_two'] ?>
        </div>
      </div>
    </div>
  </div>
</main>
<section class="about__bg-banner">
  <div class="inner">
    <div class="banner__title">VEKTOR UNİFORMA</div>
  </div>
</section>