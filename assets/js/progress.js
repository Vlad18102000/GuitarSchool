
function endedVideo() {
   let lesson_name = $("#videoarea").eq(0).attr("value");
   var params = window
      .location
      .search
      .replace('?', '')
      .split('&')
      .reduce(
         function (p, e) {
            var a = e.split('=');
            p[decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
            return p;
         },
         {}
      );
      let course_id = params['course_id'];
      console.log(course_id);

   $.ajax({
      url: 'addProgress.php',
      method: 'POST',
      data: {
         lessonStatus: "lessonStatus",
         lessonName: lesson_name,
         course_id: course_id,
      },
      success: function (response) {
         console.log(response);
      }

   });

   console.log(lesson_name);
   let lesson = $(".course__lesson-link");

   lesson.each(function () {
      if ($(this).attr('value') == lesson_name) {
         $(this).addClass('red');
      }
   });



}



