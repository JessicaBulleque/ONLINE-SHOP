const shopHover = document.querySelector('.shop-hover');
function shopIsHover() {
        if (shopHover.style.display==='none'){
            shopHover.style.display='flex';
        }

        else{
            shopHover.style.display='none';
        }
}


var counter = 1;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 4){
        counter = 1;
      }
    }, 5000);






function isClick(){
  document.querySelector('.login-container').style.left='-100%';
  document.querySelector('.register-container').style.left='0%';
}


function isClick1(){
  document.querySelector('.login-container').style.left='0%';
  document.querySelector('.register-container').style.left='100%';
}


function loginClick(){
  document.querySelector('.modal-bg').style.display='flex';
}

function loginClose(){
  document.querySelector('.modal-bg').style.display='none';
}






const wishIcon = document.getElementById('wish');

wishIcon.addEventListener('click',function(){

  if (wishIcon.src === "http://localhost/S.E/FinalSystem/icons/heart.png"){
    wishIcon.src = "./icons/heart1.png";
  }
  else{
    wishIcon.src = "./icons/heart.png";
  }
});
    













const bannerContainer = document.getElementById("banner-container");
bannerContainer.addEventListener('click', function(event){
  console.log(event);
});