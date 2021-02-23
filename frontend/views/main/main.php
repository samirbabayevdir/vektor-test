<?php
$this->title = 'Kateqoriyalar';
?>
<section class="banner__wrapper categories__page">
  <div class="banner page banner__home">
    <div class="banner__bg" style="background-image: url(/images/banner__home.jpg);"></div>
    <div class="container">
      <div class="row">
        <div class="banner__inner">
          <div class="banner__title">VEKTOR UNİFORMA</div>
          <h1 class="banner__title-h1"><?= \Yii::t('samba', 'Categories') ?></h1>
        </div>
      </div>
    </div>
    <div class="banner__skewed-bar"></div>
  </div>
</section>
<section class="categories">
  <div class="container">
    <section class="links">
      <div class="container">
        <div class="col-md-5">
          <div class="links__inner d-flex">

          </div>
        </div>
      </div>
    </section>
    <div class="row categories__header">
      <div class="col-lg-6">
        <h2><?= \Yii::t('samba', 'Categories') ?></h2>
      </div>
    </div>
    <div class="categories__list">
      <div class="categories__module">VEKTOR UNİFORMA</div>
      <div class="row justify-content-center">
        <?php foreach ($headCategs as $categ) : ?>
          <div class="col-lg-4">
            <div class="categories__box">
              <a href="<?= \yii\helpers\Url::to(['main/categories', 'id' => $categ['id']]) ?>" style="background-image: url(<?= $categ->getImageUrl() ?>);">
                <div class="categories__box-bg"></div>
                <div class="btn__vk"><?= $categ->translation['name'] ?></div>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="categories__skewed-bar"></div>
</section>