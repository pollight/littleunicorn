$(document).ready(function() {


//Делаем маску для телефона
if($('input[type=tel]').length > 0){
  $('input[type=tel]').inputmask('+7 (999) 999-99-99');
  $("input[type=tel]").inputmask({ "clearIncomplete": true });
}

//Подлючаем слайдер на первом экране
$('.screen-slider').on('init', function(event,slick) {
  $(this).css('visibility', 'visible');
});

if($('.screen-slider').length>0){
  $('.screen-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    infinite: true,
    fade: true,
    speed: 700
  });
}

    //Делаем открывание мобильного меню
    if($(window).width() < 992){
      $('#catalog').click(function(event) {
        $(this).siblings('.only-catalog-menu').addClass('visible');
        $('.layer').addClass('visible');
      });
      $('.only-catalog-menu .catalog-nav .catalog-menu>li>a').click(function(event) {
        event.preventDefault();
        if($(this).closest('li').hasClass('active')){
          $(this).closest('li').removeClass('active');
          $(this).closest('li').siblings('li').removeClass('novisible');
          $('.catalog-undermenu-mobile').show();
        } else{
          $(this).closest('li').addClass('active');
          $(this).closest('li').siblings('li').addClass('novisible');
          $('.catalog-undermenu-mobile').hide();
        }
      });

      $('.layer').click(function(event) {
        $(this).removeClass('visible');
        $('.only-catalog-menu').removeClass('visible');
      });
      $('.open-mobile-search').click(function(event) {
        $(this).toggleClass('active');
        $(this).siblings('.search-row-wrp').slideToggle();
      });
    }


    

    //Делаем открывание навигации в подвале
    if($(window).width() < 640){
      $('.footer-nav-name').click(function(event) {
        $(this).toggleClass('active');
        $(this).siblings('.footer-nav').slideToggle();
      });
    }

    //Делаем появление подсказок в поиске
    $( ".search-input" ).focus(function() {
      $(this).siblings('.search-result-list').show();
    });
    $( ".search-input" ).focusout(function() {
      setTimeout(function(){
       $('.search-result-list').hide();
     }, 100);
    });

    //Инициализируем стайлер для инпута с количиством товаров
    if($('.input_styled').length > 0){
      $('.input_styled').styler();
    }

    //Добавление товара в корзину
    $('.in-basket').click(function(event) {
      event.preventDefault();
      $('.add-to-basket-block').addClass('active');
      setTimeout(function(){
       $('.add-to-basket-block').removeClass('active');
     }, 3000);
    });


  //Запрешаем скролл страницы, когда открыто модальное окно
    $('.modal').on('shown.bs.modal', function () {
      $("html,body").css("overflow","hidden");
    })

    $('.modal').on('hide.bs.modal', function() {
      $("html,body").css("overflow","auto");
      $("html,body").css("overflowX","hidden");
    })

    //Слайдер с картинками товара на странице товара
    $('.product-slider-for').on('init', function(event,slick) {
      $(this).css('visibility', 'visible');
    });
    $('.product-slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      fade: true,
      dots: false,
      infinite: true,
      asNavFor: '.product-slider-nav',
      responsive: [
        {
          breakpoint: 640,
          settings: {
            dots: true
          }
        }
      ]
    });

    $('.product-slider-nav').on('init', function(event,slick) {
      $(this).css('visibility', 'visible');
    });
    $('.product-slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.product-slider-for',
      infinite: true,
      arrows:  false,
      focusOnSelect: true
    });

    //Слайдер рекомендованых товаров
    $('.recommend-slider').on('init', function(event,slick) {
      $(this).css('visibility', 'visible');
    });
    $('.recommend-slider').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: false,
      swipeToSlide: true,
      prevArrow: $('.prev-recommend'),
      nextArrow: $('.next-recommend'),
      infinite: true,
      responsive: [
        {
          breakpoint: 993,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2
          }
        }
      ]
    });

    //Определем высоту слайдера с рекоммендоваными продуктами и даем эту высоту для карточки продукта, чтобы все они были одинаковые
    function timerHeight(){
      setTimeout(function(){
        var stHeight = $('.recommend-slider .slick-track').height();
        $('.recommend-slider .slick-track>div').css('height',stHeight + 'px' );
      }, 500);
    }
    if($(window).width() > 640){
      timerHeight();
    }
    $( window ).resize(function() {
      if($(window).width() > 640){
        timerHeight();
      }
    });

    //Открываем дополнительную информацию на мобилке на странице товара
    $('.one-product-descriptions .item-of-descript .second-level-title').click(function(event) {
      $(this).toggleClass('active');
      $(this).siblings('.hidden-mobile-info').slideToggle();
    });

    //Открываем доставку и возврат
    $('.card-and-online-list>li .card-link').click(function(event) {
      event.preventDefault();
      $(this).toggleClass('active');
      $(this).siblings('.hidden-info').slideToggle();
    });

    //Добавляем дополнительный номер на странице корзины
    $('.add-phone-button').click(function(event) {
      event.preventDefault();
      $(this).siblings('.basic-input').show();
      $(this).hide();
    });


});








