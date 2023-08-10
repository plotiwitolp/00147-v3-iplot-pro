(function ($) {
  $(document).ready(function () {
    // start fixed menu
    $(window).scroll(function () {
      let scroll = $(window).scrollTop();
      if (scroll >= 65) {
        $('.header').addClass('header_fixed wow animate__animated  animate__fadeInDown');
      } else {
        $('.header').removeClass('header_fixed wow animate__animated  animate__fadeInDown');
      }
    });
    // end fixed menu

    // start
    $('.collapse').on('click', function () {
      if ($('.header__inner').hasClass('header__inner_hide')) {
        faAngleUp();
      } else {
        faAngleDown();
      }
    });
    // end

    // start functions
    function faAngleUp() {
      $('.fa-angle-up').addClass('collapse_active');
      $('.fa-angle-down').removeClass('collapse_active');
      //
      $('.header').removeClass('header_collapse');
      $('.header').addClass('animate__animated animate__fadeInDown animate__faster');
      $('.header__inner').removeClass('header__inner_hide');
    }
    function faAngleDown() {
      $('.fa-angle-up').removeClass('collapse_active');
      $('.fa-angle-down').addClass('collapse_active');
      //
      $('.header').addClass('header_collapse');
      $('.header').removeClass('animate__animated animate__fadeInDown animate__faster');
      $('.header__inner').addClass('header__inner_hide');
    }
    // end functions

    $('.btns__order-rework').on('click', function () {
      $('select.wpcf7-form-control option[value="Доработка сайта"]').prop('selected', true);
    });
    $('.btns__order-site').on('click', function () {
      $('select.wpcf7-form-control option[value="Создание сайта-визитки"]').prop('selected', true);
    });

    new WOW().init();
    // start technology
    $('.technology-item__progress span').each(function () {
      $(this).css({ width: `${$(this).attr('data-level')}%` });
    });
    // end technology

    // start menu
    $('.header__nav-mob').on('click', function () {
      $(this).find('div').toggleClass('nav-mob_active');
      if ($('.header__nav-mob__open').hasClass('nav-mob_active')) {
        $('.header__nav').removeClass('header__nav_active');
      } else {
        $('.header__nav').addClass('header__nav_active');
      }
    });
    // end menu
    lightbox.option({
      resizeDuration: 300,
      wrapAround: true,
      albumLabel: 'Картинка %1 из %2',
    });
    // end

    // start подгрузка отзывов
    let page = 1;
    let loading = false;
    let originalButtonText = $('.reviews-more-btn a').text();

    $('.reviews-more-btn a').on('click', function (e) {
      e.preventDefault();
      if (!loading) {
        loading = true;
        page++;
        let data = {
          action: 'load_more_reviews',
          page: page,
        };
        let url = $('.reviews-more-btn').data('url');
        $('.reviews-more-btn a').text('Загрузка...');
        $.post(url, data, function (response) {
          if (response !== 'end') {
            $('.reviews-slider__inner').append(response);
            $('.reviews-more-btn a').text(originalButtonText);
          } else {
            $('.reviews-more-btn').hide();
          }
          loading = false;
        });
      }
    });
    // end подгрузка отзывов

    // start calculator

    $('.answer-wrapper').on('click', function () {
      $(this).find('input[type=radio]').prop('checked', true);

      $(this).children('.answer-label').children('input[type=radio]').closest('.answer').siblings('.answer').children('.answers').slideUp();
      $(this).parent('.answer').children('.answers').slideDown();

      if (!$(this).find('input[type=checkbox]').prop('checked')) {
        $(this).find('input[type=checkbox]').prop('checked', true);
        $(this).siblings('.answers').children('.answer').slideDown();
      } else {
        $(this).find('input[type=checkbox]').prop('checked', false);
        $(this).siblings('.answers').children('.answer').slideUp();
      }

      if ($(this).siblings('.answers').children('.answer').length == 1) {
        $(this).siblings('.answers').children('.answer').children('.answer-wrapper').find('input').prop('checked', true);
        $(this).siblings('.answers').children('.answer').children('.answer-wrapper').siblings('.answers').slideDown();
        $(this).siblings('.answers').children('.answer').children('.answer-wrapper').siblings('.answers').children('.answer').slideDown();
      }

      if (!$(this).find('input').prop('checked')) {
        console.log('test');
        $(this).siblings('.answers').find('input').prop('checked', false);
        $(this).siblings('.answers').find('.answers').slideUp();
      }

      dataCollection();
    });

    function dataCollection() {
      let answerPricesArray = [];
      let visibleAnswers = [];
      $('.calculator__inner .answer').each(function () {
        if ($(this).is(':visible') && $(this).children('.answer-wrapper').find('input').prop('checked') && $(this).parents('.answer').is(':visible')) {
          visibleAnswers.push($(this));
        }
      });
      visibleAnswers.forEach(function (element) {
        let answerPriceText = element.children('.answer-wrapper').find('.answer-price').text();
        answerPricesArray.push(answerPriceText);
      });

      return calc(answerPricesArray);
    }

    function calc(arr) {
      let sum = 0;
      arr.forEach(function (text) {
        let number = parseFloat(text);
        if (!isNaN(number)) {
          sum += number;
        }
      });
      return sum;
    }

    $('.calculator-order-btn').on('click', function () {
      const result = dataCollection();
      if (result > 0) {
        const resultElement = $('.calculator-order-result');
        resultElement.html(
          'Примерная стоимость по указанным критериям составляет:  <span class="calculator-order-result__price">' +
            result +
            '₽</span><br>Чтобы узнать окончательную стоимость <a href="/contacts" style="text-decoration: underline;">обратитесь ко мне</a>'
        );
        resultElement.show();
      } else {
        const resultElement = $('.calculator-order-result');
        resultElement.text('Заполните, пожалуйста, необходимые пункты опроса');
        resultElement.show();
      }
    });
    // end calculator
  });
})(jQuery);
