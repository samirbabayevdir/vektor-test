<?php
$this->title = $product['name'];
?>
<section class="banner__wrapper categories__page">
  <div class="banner page banner__home">
    <div class="banner__bg" style="background-image: url(<?= $bannerCateg->getImage_bannerUrl() ?>);"></div>
    <div class="container">
      <div class="row">
        <div class="banner__inner">
          <div class="banner__title">VEKTOR UNİFORMA</div>
          <h1 class="banner__title-h1"><?= $product['name'] ?></h1>
        </div>
      </div>
    </div>
    <div class="banner__skewed-bar"></div>
  </div>
</section>
<section class="product__page">
  <div class="container">
    <section class="links">
      <div class="container">
        <div class="links__inner d-flex">
          <?= $links ?> <a style="order:100"><?= $product['name'] ?></a>
        </div>
      </div>
    </section>
    <div class="row categories__header">
      <div class="col-lg-6">
        <h2><?= $product['name'] ?></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="product__slider">
          <?php if (count($product->imgsUrl) == 1) : ?>
            <?php $img = $product->imgsUrl[0]; ?>
            <img src="<?= $img ?>" alt="<?= $product->name ?>" class="item">
          <?php else : ?>
            <div class="slider-for">
              <?php foreach ($product->imgsUrl as $img) : ?>
                <img src="<?= $img ?>" alt="<?= $product->name ?>" class="item">
              <?php endforeach; ?>
            </div>
            <div class="slider-nav">
              <?php foreach ($product->imgsUrl as $img) : ?>
                <div class="item">
                  <img src=" <?= $img ?>" alt="<?= $product->name ?>">
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="product__info">
          <?= $product->translation['description'] ?>
        </div>
      </div>

    </div>
  </div>
  <div class="categories__skewed-bar"></div>

</section>