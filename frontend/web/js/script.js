// Burger
$(document).ready(function () {
  $('.header__burger,.header__bg').click(function (event) {
    $('.header__burger,.header__menu,.header__bg').toggleClass('active');
    $('body').toggleClass('lock');
  });

  $(".mobile__acc").dcAccordion({
    speed: 300
  });

  $(window).scroll(function () {
    var $heightScrolled = $(window).scrollTop();
    var $defaultHeight = 0;

    if ($heightScrolled > $defaultHeight) {
      $('.header').addClass("transition");
    }
    else {
      $('.header').removeClass("transition");
    }
  });

  //lang
  // const theLanguage = $('html').attr('lang');
  // if (theLanguage == 'ru-RU') {
  //   // $('body').css('font-family', '"Montserrat", sans-serif;');
  //   // $(".banner__title-h1").css('font-family', '"Montserrat", sans-serif;');
  //   $("body").on({
  //     mouseenter: function () {
  //       $(this).css({ "font-family": "Montserrat, sans-serif"});
  //     }
  //   });
  //   console.log('s');
  // }
});

mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

//Slider


$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: false,
  asNavFor: '.slider-nav',
  prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-left"></i></button>',
  nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>',
});

$('.slider-nav').on('init', function (event, slick) {
  $('.slider-nav .slick-slide.slick-current').addClass('is-active');
})
  .slick({
    asNavFor: '.slider-for',
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    focusOnSelect: true,
    infinite: true,
    arrows: false,
  });


$('.slider-for').on('afterChange', function (event, slick, currentSlide) {
  $('.slider-nav').slick('slickGoTo', currentSlide);
  var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
  $('.slider-nav .slick-slide.is-active').removeClass('is-active');
  $(currrentNavSlideElem).addClass('is-active');
});

$('.slider-nav').on('click', '.slick-slide', function (event) {
  event.preventDefault();
  var goToSingleSlide = $(this).data('slick-index');

  $('.slider-for').slick('slickGoTo', goToSingleSlide);
});