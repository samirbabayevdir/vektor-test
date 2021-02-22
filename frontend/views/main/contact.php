<?php
$this->title = 'Əlaqə';


use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<section class="banner__wrapper">
  <div class="banner page banner__home">
    <div class="banner__bg" style="background-image: url(/images/banniere.jpg);"></div>
    <div class="container">
      <div class="row">
        <div class="banner__inner">
          <div class="banner__title">VEKTOR UNİFORMA</div>
          <h1 class="banner__title-h1">Bizimlə Əlaqə</h1>
        </div>
      </div>
    </div>
    <div class="banner__skewed-bar"></div>
  </div>
</section>
<main class="main contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="main__about-left">
          <h2>Bİzə Yazın!</h2>
          <div class="cotnact__form">
            <?php $form = ActiveForm::begin(); ?>
            <div class="two">
              <div class="input__inner">
                <?= $form->field($response, 'name')->textInput(['maxlength' => true]) ?>
              </div>
              <div class="input__inner">
                <?= $form->field($response, 'surname')->textInput(['maxlength' => true]) ?>
              </div>
            </div>
            <div class="two">
              <div class="input__inner">
                <?= $form->field($response, 'email')->textInput(['maxlength' => true]) ?>
              </div>
              <div class="input__inner">
                <?= $form->field($response, 'phone')->textInput(['maxlength' => true]) ?>
              </div>
            </div>
            <div class="input__inner">
              <?= $form->field($response, 'message')->textarea(['maxlength' => true, 'cols' => 30, 'rows' => 10, 'placeholder' => 'Təkliflər, Məhsullar, Sifarişlər, Əlavə Məlumat...']) ?>
            </div>
            <div class="button__inner">
              <?= Html::submitButton('Göndər', ['class' => 'btn__vk']) ?>
            </div>
            <?php ActiveForm::end(); ?>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="main__about-right">
          <h2>Əlaqə Məlumatı</h2>
          <ul>
            <li>Email: <?= $contact[0]['email'] ?></li>
            <li>Telefon: <?= $contact[0]['number'] ?></li>
            <li>Ünvan: <?= $contact[0]['address'] ?></li>
          </ul>
          <img src="<?= $about[0]->getImageUrl() ?>" alt="VEKTOR UNIFORMA">
        </div>
      </div>
    </div>
  </div>
</main>
<section class="map">
  <div class="" id="map">
    <script>
      // position we will use later
      var lat = 40.329146;
      var lon = 49.776107;
      // initialize map
      map = L.map('map', {
        scrollWheelZoom: false
      }).setView([lat, lon], 13);

      var myIcon = L.icon({
        iconUrl: '/images/vektor_icon.svg',
        // iconSize: [38, 95],
        iconAnchor: [40, 40],
        // popupAnchor: [-3, -76],
        // shadowUrl: 'my-icon-shadow.png',
        // shadowSize: [68, 95],
        // shadowAnchor: [22, 94]
      });

      // set map tiles source
      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 18,
      }).addTo(map);
      // add marker to the map
      marker = L.marker([lat, lon], {
        icon: myIcon
      }).addTo(map);
      // add popup to the marker
      marker.bindPopup("<b>VEKTOR UNIFORMA.</b><br/><?= $contact[0]['address'] ?>").openPopup();
    </script>
  </div>
</section>