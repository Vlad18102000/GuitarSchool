

document.addEventListener('DOMContentLoaded', function () {
   const modalBtn = document.querySelectorAll('[data-modal]');
   const body = document.body;
   const closeModal = document.querySelectorAll('.modal__close');
   const modal = document.querySelectorAll('.modal');

   

   modalBtn.forEach(item => {

      item.addEventListener('click', event => {
         let $this = event.currentTarget;
         let modalId = $this.getAttribute('data-modal');
         let modal = document.getElementById(modalId);
         let modalContent = document.querySelector('.modal__content');

         modalContent.addEventListener('click', event => {
            event.stopPropagation();
         });

         modal.classList.add('show');
         body.classList.add('no-scroll');

         setTimeout(function () {
            modalContent.style.transform = 'none';
         }, 1);

      });
   });

   closeModal.forEach(item => {
      item.addEventListener('click', event => {
         let currentModal = event.currentTarget.closest('.modal');
         modalClose(currentModal);
      });
   });

   modal.forEach(item => {
      item.addEventListener('click', event => {
         let currentModal = event.target;
         modalClose(currentModal);

      });
   });

   function modalClose(currentModal) {

      let modalContent = currentModal.querySelector('.modal__content');
      modalContent.removeAttribute('style');

      setTimeout(() => {
         currentModal.classList.remove('show');
         body.classList.remove('no-scroll');
      }, 200);

   }


}, false);
