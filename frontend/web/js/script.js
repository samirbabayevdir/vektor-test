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


//SLIDER SINGLE PRODUCT
$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: true,
  asNavFor: '.slider-nav',
  nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" style=""><i class="fas fa-arrow-right"></i></button>',
  prevArrow: '<button class="slick-prev slick-arrow" aria-label="Next" type="button" style=""><i class="fas fa-arrow-left"></i></button>',
});

$('.slider-nav').slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  centerMode: true,
  focusOnSelect: true,
  arrows: false,
});
