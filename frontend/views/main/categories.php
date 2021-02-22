<?php
$this->title = $headCateg['name'];
?>
<section class="banner__wrapper categories__page">
  <div class="banner page banner__home">
    <div class="banner__bg" style="background-image: url(<?= $bannerCateg->getImage_bannerUrl() ?>);"></div>
    <div class="container">
      <div class="row">
        <div class="banner__inner">
          <div class="banner__title">VEKTOR UNİFORMA</div>
          <h1 class="banner__title-h1"><?= $headCateg['name'] ?></h1>
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
        <div class="links__inner d-flex">
          <?= $links ?>
        </div>
      </div>
    </section>
    <div class="row categories__header">
      <div class="col-lg-6">
        <h2>KATEQORİYALAR</h2>
      </div>
    </div>
    <div class="categories__list">
      <div class="categories__module">VEKTOR UNİFORMA</div>
      <div class="row justify-content-center">
        <?php foreach ($childCategs as $categ) : ?>
          <div class="col-lg-4">
            <div class="categories__box">
              <a href="<?= \yii\helpers\Url::to(['main/categories', 'id' => $categ['id']]) ?>" style="background-image: url(<?= $categ->getImageUrl() ?>);">
                <div class="categories__box-bg"></div>
                <div class="btn__vk"><?= $categ['name'] ?></div>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="categories__skewed-bar"></div>
</section>