// VARIABLE BUTTONS
const regClick = document.getElementById("reg-click");
const logClick = document.getElementById("log-click");
const loginIconClick = document.getElementById("login-icon-click");

const closeClick = document.querySelector(".close");

// VARIABLE FORMS
const modalContainer = document.querySelector(".modal-bg");
const loginForm = document.querySelector(".login-box");
const regForm = document.querySelector(".reg-box");


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

closeClick.addEventListener('click', function(){
    modalContainer.style.top = "-100%";
    modalContainer.style.opacity = "0";
});
