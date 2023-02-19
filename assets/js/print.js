
function printElement(){
   var body = $('body').html(),
   el = $('.print'),
   btn = $('.btn');
   btn.css({
      'display':'none',
   });
   el.css({
      'color':'black',
   });
   $('body').html(el);
   window.print();
   $('body').html(body);
}