//$(document).ready(function () {
   $(function () {
      //let value = $("#playlist a").eq(1).attr("value");
      $("#videoarea").attr({
         value: $("#playlist a").eq(0).attr("value"),
         src: $("#playlist a").eq(0).attr("movieurl"),
         //value: $("#playlist a").eq(0).attr("value")
         
      });

      $("#playlist a").on("click", function () {
         $("#videoarea").attr({
            src: $(this).attr("movieurl"),
            value: $(this).attr("value"),
         });
      });
   

      var def = $("#lesson_name").attr('value');
      $("#videoname").html(def);
      console.log(def);
      $("#playlist a").on("click", function () {
       
         //let value = $("#playlist a").eq(0).attr("value");
         let name = $(this).attr('value');
         $("#videoarea").val(name);
         $("#videoname").html(name);

      });

     
   });
