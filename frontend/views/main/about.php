<?php
$this->title = 'Haqqımızda';
?>
<section class="banner__wrapper">
  <div class="banner page banner__home">
    <div class="banner__bg" style="background-image: url(<?= $about[0]->getImage_bannerUrl() ?>);"></div>
    <div class="container">
      <div class="row">
        <div class="banner__inner">
          <div class="banner__title">VEKTOR UNİFORMA</div>
          <h1 class="banner__title-h1">Haqqımızda</h1>
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
          <h2>Məhsullar Haqqında</h2>
          <?= $about[0]['description_one'] ?>
          <img src="<?= $about[0]->getImageUrl() ?>" alt="VEKTOR UNIFORMA">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="main__about-left">
          <h2>VEKTOR UNİFORMA</h2>
          <?= $about[0]['description_two'] ?>
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