window.onload = () => {
   const textarea = document.querySelectorAll('[data-autoresize]');
   const uploadFile = document.getElementById("course_img");
   const uploadBtn = document.getElementById("upload_btn");
   const uploadText = document.getElementById("upload_text");


   uploadBtn.addEventListener("click", function () {
      uploadFile.click();
   });

   uploadFile.addEventListener("change", function () {
      if (uploadFile.value) {
         uploadText.innerText = uploadFile.value.match(/[\/\\]([\w\d\s\.\-(\)]+)$/)[1];

      } else {
         uploadText.innerText = "Nie wybrano pliku";
      }
   });

   textarea.forEach(item => {
      let textareaH = item.offsetHeight;
      item.addEventListener('input', event => {
         let $this = event.target;
         $this.style.height = textareaH + 'px';
         $this.style.height = $this.scrollHeight + 'px';
      });
   });
};
