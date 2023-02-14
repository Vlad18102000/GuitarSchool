$(document).ready(function(){
   $(function(){
   $("#playlist a").on("click", function(){
      $("#videoarea").attr({
         src: $(this).attr("movieurl"),
      });
   });
   $("#videoarea").attr({
      src: $("#playlist a").eq(0).attr("movieurl")
   });
   });
});