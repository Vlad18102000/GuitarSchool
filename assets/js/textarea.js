const textarea = document.querySelectorAll('[data-autoresize]');

textarea.forEach(item => {
   let textareaH = item.offsetHeight;
   item.addEventListener('input', event => {
      let $this = event.target;
      $this.style.height = textareaH + 'px';
      $this.style.height = $this.scrollHeight + 'px';
   });
});