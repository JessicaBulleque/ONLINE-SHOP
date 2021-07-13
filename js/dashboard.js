// NAVIGATION LINK BUTTON // 
const dashboardLink = document.querySelector(".dashboard");
const customerLink = document.querySelector(".customer");
const categoryLink = document.querySelector(".category");
const productsLink = document.querySelector(".products");
const ordersLink = document.querySelector(".orders");
const shipmentLink = document.querySelector(".shipment");
const addMovieBtn = document.querySelector("#add-movie-btn");


// FORM CONTAINER
const customerContainer = document.querySelector(".customer-container");
const dashboardContainer = document.querySelector(".admin-content");
const categoryContainer = document.querySelector(".category-container");
const productContainer = document.querySelector(".product-container");
const ordersContainer = document.querySelector(".orders-container");
const shipmentContainer = document.querySelector(".shipment-container");


// FUNCTIONS //
//CUSTOMER//
dashboardLink.addEventListener('click', function(){
    //container//
    dashboardContainer.style.display = "block";
    customerContainer.style.display = "none";
    categoryContainer.style.display = "none";
    ordersContainer.style.display = "none";
    shipmentContainer.style.display = "none";
    //colors//
    dashboardLink.style.background = 'rgba(0, 0, 0, 0.5)';
    customerLink.style.background = 'none';
    categoryLink.style.background = 'none';
    productsLink.style.background = 'none';
    ordersLink.style.background = 'none';
    shipmentLink.style.background = 'none';
});

customerLink.addEventListener('click', function(){
    //container//
    customerContainer.style.display = "block";
    dashboardContainer.style.display = "none";
    categoryContainer.style.display = "none";
    ordersContainer.style.display = "none";
    shipmentContainer.style.display = "none";
    //colors//
    customerLink.style.background = 'rgba(0, 0, 0, 0.5)';
    dashboardLink.style.background = 'none';
    categoryLink.style.background = 'none';
    productsLink.style.background = 'none';
    ordersLink.style.background = 'none';
    shipmentLink.style.background = 'none';
});

//CATEGORY//
categoryLink.addEventListener('click', function(){
    //container//
    categoryContainer.style.display = "block";
    customerContainer.style.display = "none";
    dashboardContainer.style.display = "none";
    ordersContainer.style.display = "none";
    shipmentContainer.style.display = "none";
    //colors//
    categoryLink.style.background = 'rgba(0, 0, 0, 0.5)';
    customerLink.style.background = 'none';
    dashboardLink.style.background = 'none';
    productsLink.style.background = 'none';
    ordersLink.style.background = 'none';
    shipmentLink.style.background = 'none';
});


//PRODUCTS//
productsLink.addEventListener('click', function(){
    //container//
    productContainer.style.display = "block";
    customerContainer.style.display = "none";
    dashboardContainer.style.display = "none";
    categoryContainer.style.display = "none";
    ordersContainer.style.display = "none";
    shipmentContainer.style.display = "none";
    //colors//
    productsLink.style.background = 'rgba(0, 0, 0, 0.5)';
    categoryLink.style.background = 'none';
    customerLink.style.background = 'none';
    dashboardLink.style.background = 'none';
    ordersLink.style.background = 'none';
    shipmentLink.style.background = 'none';
})


//ORDERS//
ordersLink.addEventListener('click', function(){
    //container//
    ordersContainer.style.display = "block";
    productContainer.style.display = "none";
    customerContainer.style.display = "none";
    dashboardContainer.style.display = "none";
    categoryContainer.style.display = "none";
    shipmentContainer.style.display = "none";
    //colors//
    ordersLink.style.background = 'rgba(0, 0, 0, 0.5)';
    productsLink.style.background = 'none';
    categoryLink.style.background = 'none';
    customerLink.style.background = 'none';
    dashboardLink.style.background = 'none';
    shipmentLink.style.background = 'none';
})


//SHIPMENT//
shipmentLink.addEventListener('click', function(){
    //container//
    shipmentContainer.style.display = "block";
    ordersContainer.style.display = "none";
    productContainer.style.display = "none";
    customerContainer.style.display = "none";
    dashboardContainer.style.display = "none";
    categoryContainer.style.display = "none";
    //colors//
    shipmentLink.style.background = 'rgba(0, 0, 0, 0.5)';
    ordersLink.style.background = 'none';
    productsLink.style.background = 'none';
    categoryLink.style.background = 'none';
    customerLink.style.background = 'none';
    dashboardLink.style.background = 'none';
})



