// VARIABLE BUTTONS
const regClick = document.getElementById("reg-click");
const logClick = document.getElementById("log-click");
const loginIconClick = document.getElementById("login-icon-click");
const userLoginClick = document.getElementById("user-profile");

const closeClick = document.querySelector(".close");
const shopHover = document.querySelector(".shop-icon");

// VARIABLE FORMS
const modalContainer = document.querySelector(".modal-bg");
const loginForm = document.querySelector(".login-box");
const regForm = document.querySelector(".reg-box");
const shopIsHover = document.querySelector(".shop-hover");
const navAccountBox = document.querySelector(".nav-account");


// EVENT LISTERNER FUNCTIONS

// EVENT FOR LOGIN AND REGISTER BOX
regClick.addEventListener('click', function(){
    loginForm.style.left = "-100%";
    regForm.style.left = "0%";
});

logClick.addEventListener('click', function(){
    loginForm.style.left = "0%";
    regForm.style.left = "100%";
});


// OPEN AND CLOSE THE MODAL BG
loginIconClick.addEventListener('click', function(){
    modalContainer.style.top = "0%";
    modalContainer.style.opacity = "1";
});




// SHOW ACCOUNT NAV LINK

userLoginClick.addEventListener('click', function(){
    if(navAccountBox.style.display === "flex"){
        navAccountBox.style.display = "none";
    }
    else{
        navAccountBox.style.display = "flex";
    }
});






closeClick.addEventListener('click', function(){
    modalContainer.style.top = "-100%";
    modalContainer.style.opacity = "0";
});


// NAV LINK SHOP IS HOVER 

shopHover.addEventListener('mouseover', function(){
    shopIsHover.style.display = "flex";

    shopIsHover.addEventListener('mouseover', function(){
        shopIsHover.style.display = "flex";
       
    })
    shopIsHover.addEventListener('mouseout', function(){
        shopIsHover.style.display = "none";
    })

})
