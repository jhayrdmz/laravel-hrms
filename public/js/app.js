(function(){

  $('.initial-image').initial({ fontSize: 32 });

  $('.datepicker').datetimepicker({
    defaultDate: new Date(),
    format: 'DD/MM/YYYY',
  });

  $('.timepicker').datetimepicker({
    format: 'LT'
  });

  $('#left-navigation').find('li.has-sub>a').on('click', function(e){
    e.preventDefault();
    var $thisParent = $(this).parent();

    if ( $thisParent.hasClass('sub-open') ) {

      // Hide the Submenu
      $thisParent.removeClass('sub-open').children('ul.sub').slideUp(150);

    } else {

      // Show the Submenu
      $thisParent.addClass('sub-open').children('ul.sub').slideDown(150);

      // Hide Others Submenu
      $thisParent.siblings('.sub-open').removeClass('sub-open').children('ul.sub').slideUp(150);

    }
  });

})();


