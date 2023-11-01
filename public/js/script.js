// モーダル部分
$(function () { //①
  // console.log('hello');
    $('.modalopen').each(function () {
      $(this).on('click', function () {
        var target = $(this).data('target');
        var modal = document.getElementById(target);
        console.log(modal);
        $(modal).fadeIn();
        return false;
      });
    });

    $('.modal-inner').on('click', function (e) {
      if (!$(e.target).closest('.inner-content').length){
        console.log('hello');
      $('.js-modal').fadeOut();
      return false;
      }
    });

  });
