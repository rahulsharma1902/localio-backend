window.addEventListener('load', () => {
  aos.init();
});

//product- comparison page slider

$(document).ready(function () {
  $('.compari-pack').slick({
     infinite: false,
     slidesToShow: 1,
     slidesToScroll: 1,
     dots: false,
     arrows: false,
     infinite: true,


  });
});


// header dropdown at mobile js

$('.mobile-drop').on('click', function (e) {
  e.preventDefault();
  $('.mobile-drop').not(this).find('.mob-drp-contnt').removeClass('show');
  $(this).find('.mob-drp-contnt').toggleClass('show');
});


$(document).ready(function () {
  var $counter = $('.slide-count');
  var $slider = $('.adp_slider');

  $slider.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
     var i = (currentSlide ? currentSlide : 0) + 1;
     $counter.text(i + '/' + slick.slideCount);
  });

  $slider.slick({
     infinite: false,
     dots: false,
     arrows: true,
     autoplay: true,

  });
});


const optionMenu = document.querySelector(".select-menu"),
  selectBtn = optionMenu.querySelector(".select-btn"),
  options = optionMenu.querySelectorAll(".option"),
  sBtn_text = optionMenu.querySelector(".sBtn-text");

selectBtn.addEventListener("click", () =>
  optionMenu.classList.toggle("active")
);

options.forEach((option) => {
  option.addEventListener("click", () => {
     let selectedOption = option.querySelector(".option-text").innerText;
     sBtn_text.innerText = selectedOption;

     optionMenu.classList.remove("active");
  });
});


$(document).ready(function () {
  $('.reviews_slider').slick({
     infinite: false,
     slidesToShow: 3,
     slidesToScroll: 1,
     dots: false,
     arrows: true,
     autoplay: false,
     autoplaySpeed: 3000,
     responsive: [{
           breakpoint: 1024,
           settings: {
              slidesToShow: 2,
              slidesToScroll: 1
           }
        },
        {
           breakpoint: 768,
           settings: {
              slidesToShow: 1,
              slidesToScroll: 1
           }
        },
        {
           breakpoint: 575,
           settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              dots: false,
           }
        }
     ]
  });
});

$(document).ready(function () {
  $('.xclusve-slider').slick({
     slidesToShow: 3,
     slidesToScroll: 1,
     dots: false,
     arrows: true,
     infinite: false,
     responsive: [{
           breakpoint: 992,
           settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              infinite: false,
              dots: false,
           }
        },
        {
           breakpoint: 767,
           settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: false,
              dots: false,
           }
        },
        {
           breakpoint: 575,
           settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              dots: false,
              arrows: true,
           }
        },
     ]

  });
});

$(document).ready(function () {
  $('.top-rated-slider').slick({
     slidesToShow: 4,
     slidesToScroll: 1,
     dots: false,
     arrows: true,
     infinite: false,
     responsive: [{
           breakpoint: 1599,
           settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
              infinite: false,
              dots: false,
           }
        },
        {
           breakpoint: 991,
           settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              infinite: false,
              dots: false,
           }
        },

        {
           breakpoint: 767,
           settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: false,
              dots: false,
           }
        },
     ]
  });
});

$(document).ready(function () {
  $('.trust-brnd-marque').slick({
     slidesToShow: 6,
     slidesToScroll: 1,
     autoplay: true,
     autoplaySpeed: 1,
     speed: 5000,
     dots: false,
     arrows: false,
     cssEase: 'linear',
     waitForAnimate: false,
     pauseOnFocus: false,
     pauseOnHover: false,
     infinite: true,
     responsive: [{
           breakpoint: 991,
           settings: {
              slidesToShow: 4,
              slidesToScroll: 1,
              infinite: true,
              dots: false,
           }
        },
        {
           breakpoint: 575,
           settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              infinite: true,
              dots: false,
           }
        },

     ]
  });

  // product detail page js


  $('.slider-for').slick({
     slidesToShow: 1,
     slidesToScroll: 1,
     arrows: false,
     fade: true,
     asNavFor: '.slider-nav'
  });
  $('.slider-nav').slick({
     slidesToShow: 5,
     slidesToScroll: 1,
     asNavFor: '.slider-for',
     dots: false,
     focusOnSelect: true
  });

  $('#togglePassword').on('click', function () {
     let passwordField = $('#password');
     let icon = $(this).find('i');

     // Toggle the password field type
     if (passwordField.attr('type') === 'password') {
        passwordField.attr('type', 'text');
        icon.removeClass('fa-eye-slash').addClass('fa-eye');
     } else {
        passwordField.attr('type', 'password');
        icon.removeClass('fa-eye').addClass('fa-eye-slash');
     }
  });

});


// range js
window.onload = function () {
  slideOne();
  slideTwo();
};

let sliderOne = document.getElementById("slider-1");
let sliderTwo = document.getElementById("slider-2");
let displayValOne = document.getElementById("range1");
let displayValTwo = document.getElementById("range2");
let minGap = 0;
let sliderTrack = document.querySelector(".range-slider-track");
let sliderMaxValue = document.getElementById("slider-1").max;

function slideOne() {
  if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
     sliderOne.value = parseInt(sliderTwo.value) - minGap;
  }
  displayValOne.textContent = sliderOne.value;
  fillColor();
}

function slideTwo() {
  if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
     sliderTwo.value = parseInt(sliderOne.value) + minGap;
  }
  displayValTwo.textContent = sliderTwo.value;
  fillColor();
}

function fillColor() {
  percent1 = (sliderOne.value / sliderMaxValue) * 100;
  percent2 = (sliderTwo.value / sliderMaxValue) * 100;
  sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #06498b ${percent1}% , #06498b ${percent2}%, #dadae5 ${percent2}%)`;
}

// header search js /////////////////////////////////////////////////////////
// myID = document.getElementById("myID");

// var myScrollFunc = function () {
//     var y = window.scrollY;
//     if (y >= 200) {
//         myID.className = "bottomMenu show"
//     } else {
//         myID.className = "bottomMenu hide"
//     }
// };

window.addEventListener("scroll", myScrollFunc);


// search bar

function checkScroll() {
   var myElement = document.getElementById("myID");
   
   // Check if the page has been scrolled 200px or more
   if (window.scrollY > 460) {
     myElement.style.visibility = "visible";  // Show the element
   } else {
     myElement.style.visibility = "hidden";   // Hide the element
   }
 }

 // Add the scroll event listener
 window.addEventListener("scroll", checkScroll);

 // Run the checkScroll function on initial page load to account for already scrolled pages
 window.onload = checkScroll;