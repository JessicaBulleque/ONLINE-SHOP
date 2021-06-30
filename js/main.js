window.addEventListener('scroll', function() {
  let header = document.querySelector('header');

  header.classList.toggle('scrolling', window.scrollY > 0);
})


// SLIDER AREA
var counter = 1;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 4){
        counter = 1;
      }
}, 5000);










