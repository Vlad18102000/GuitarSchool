$(document).ready(function () {
   $(function () {
      $("#playlist a").on("click", function () {
         $("#videoarea").attr({
            src: $(this).attr("movieurl"),
         });
      });
      $("#videoarea").attr({
         src: $("#playlist a").eq(0).attr("movieurl")
      });

      var def = $("#lesson_name").attr('value');
      $("#videoname").html(def);
      console.log(def);
      $("#playlist a").on("click", function () {

         let name = $(this).attr('value');

         $("#videoname").html(name);

      });

      const video = document.querySelector("video");
      video.addEventListener("ended", function(e) {
         let $this = e.currentTarget;
         let videoCompleted = true;
         console.log(videoCompleted);
         
         let finish = document.querySelector(".course__lesson-duration");
         finish.classList.add('red');
     });

   });
});