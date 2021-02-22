<?php
$this->title = 'Əsas';
?>

<section class="banner__wrapper">
  <div class="banner banner__home">
    <div class="banner__bg" style="background-image: url(/images/banner__home.jpg);"></div>
    <div class="container">
      <div class="row">
        <div class="banner__inner">
          <div class="banner__title">VEKTOR UNİFORMA</div>
          <h1 class="banner__title-h1">AZƏRBAYCANDA<br /> XÜSUSİ İŞ GEYİMLƏRİ & UNİFORMALAR MAĞAZASI</h1>
          <a href="<?= \yii\helpers\Url::to(['/main/main']) ?>" class="btn__vk">Kateqorİyalar</a>
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
          <h2>VEKTOR UNİFORMA, 15 İLDƏN ÇOX SİZİNLƏ</h2>
          <?= $model[0]['description_two'] ?>
          <!-- <p>Bizim kompaniya müxtəlif cür iş geyimlərinin(uniformalarının) topdan
            satışı ilə məşğuldur:</p>
          <ul>
            <li>korporativ geyimlər</li>
            <li>iş geyimləri</li>
            <li>iş əlcəkləri</li>
            <li>iş ayaqqabıları</li>
            <li>fərdi qoruyucu vasitələr</li>
            <li>təhlükəsizlik avadanlıqları</li>
            <li>və s.</li>
          </ul>
          <p>
            Bizdə geniş çeşidli
            məhsullar vardır ki, istənilən tədbir, təşkilat və müəssəni
            funksianallaşdıra bilər. <br /> <br /> Bizim müştərilərimiz arasında həm hüquqi həm
            də fiziki şəxslər mövcuddur. Hər bir müştəriyə onun tələb və
            istəklərinə uyğun olaraq endirimlər təklif etməyə hazırıq. Müsabiqəli,
            daimi alıcı və sezon endirimləri mövcuddur.</p> -->
          <h4><a href="<?= \yii\helpers\Url::to(['/main/about']) ?>">ƏTRAFLI</a></h4>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="main__about-right">
          <h3>İXTİSASLAŞMAMIZ</h3>
          <ul>
            <li style="background-image: url(/images/clothesssew.svg)"><a>KORPORATİV ÜSULLA TİKİLİŞ</a></li>
            <li style="background-image: url(/images/flex.svg)"><a>LOQOLARIN FLEKS VURULMASI</a></li>
            <li style="background-image: url(/images/logosew.svg)"><a>LOQOLARIN TİKİŞLƏ VURULMASI</a></li>
          </ul>
          <img src="/images/vektor-vektors.svg" alt="VEKTOR UNIFORMA">
        </div>
      </div>
    </div>
  </div>
</main>
<section class="categories">
  <div class="container">
    <div class="row categories__header">
      <div class="col-lg-6">
        <h2>KATEQORİYALAR</h2>
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