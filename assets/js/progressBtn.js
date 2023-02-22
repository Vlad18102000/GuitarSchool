document.addEventListener('DOMContentLoaded', function () {
  const lessonProgress = document.querySelectorAll("#progress");

  for (var i = 0; i < lessonProgress.length; i++) {
    var myElementValue = lessonProgress[i];
    if (myElementValue.value === 100) {
      const parentElem = myElementValue.parentElement.parentElement;
      const btn = document.createElement('button');
      btn.innerText = 'Certificate';
      btn.type = 'submit';
      btn.classList.add('btn');
      btn.classList.add('btn--red');
      btn.classList.add('btn--certyficate');


      // btn.id= "certyficateBtn";
      parentElem.appendChild(btn);

    }
  }

}, false);