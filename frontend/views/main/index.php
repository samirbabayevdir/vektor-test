<?php
$this->title = 'Əsas';
?>

<section class="banner__wrapper">
  <div class="banner banner__home">
    <div class="banner__bg" style="background-image: url(images/banner__home.jpg);"></div>
    <div class="container">
      <div class="row">
        <div class="banner__inner">
          <div class="banner__title">VEKTOR UNİFORMA </div>
          <h1 class="banner__title-h1"><?= \Yii::t('samba', 'SPECIAL WORK<br> CLOTHES & UNIFORMS STORE IN AZERBAIJAN') ?></h1>
          <a href="<?= \yii\helpers\Url::to(['/main/main']) ?>" class="btn__vk"><?= \Yii::t('samba', 'Categories') ?></a>
        </div>
      </div>
    </div>
    <div class="banner__skewed-bar"></div>
  </div>
</section>
<main class="main">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="main__about-left">
          <h2><?= \Yii::t('samba', 'VEKTOR UNIFORMA, MORE THAN 15 YEARS IN CLOTHING') ?></h2>
          <?= empty($about[0]->translation['description_two']) ? '' :  $about[0]->translation['description_two'] ?>
          <h4><a href="<?= \yii\helpers\Url::to(['/main/about']) ?>"><?= \Yii::t('samba', 'MORE') ?></a></h4>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="main__about-right">
          <h3><?= \Yii::t('samba', 'SPECIALITIES') ?></h3>
          <ul>
            <li style="background-image: url(images/clothesssew.svg)"><a><?= \Yii::t('samba', 'CORPORATE STYLE') ?></a></li>
            <li style="background-image: url(images/flex.svg)"><a><?= \Yii::t('samba', 'FLEX INJECTION OF LOGOS') ?></a></li>
            <li style="background-image: url(images/logosew.svg)"><a><?= \Yii::t('samba', 'STICKING LOGOS') ?></a></li>
          </ul>
          <img src="images/vektor-vektors.svg" alt="VEKTOR UNIFORMA">
        </div>
      </div>
    </div>
  </div>
</main>
<section class="categories">
  <div class="container">
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