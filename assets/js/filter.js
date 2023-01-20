$(function () {
   //Filter
   let filter = $('[data-filter]');

   filter.on('click', function (e) {

      e.preventDefault();

      let category = $(this).data('filter');

      if (category == 'all') {
         $('[data-cat]').removeClass('course__hide')
      } else {
         $('[data-cat]').each(function () {
            let courseCategory = $(this).data('cat');
            if (courseCategory != category) {
               $(this).addClass('course__hide');
            } else {
               $(this).removeClass('course__hide');
            }
         });
      }
   });
});