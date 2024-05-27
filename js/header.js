let logo = document.getElementById("logo");
logo.addEventListener("click", function(){
    window.location = ("index.php");
})
let profile = document.getElementById("profile");
profile.addEventListener("click", function(){
    window.location = ("profilepage.php");
})
let catalog = document.getElementById("catalog");
catalog.addEventListener("click", function(){
    window.location = ("allbooks.php");
})
let headerBtnOrder = document.getElementById("headerBtnOrder");
headerBtnOrder.addEventListener("click" , function(){
    window.location = ("orderspage.php");
})
let headerBtnBookmarks = document.getElementById("headerBtnBookmarks");
headerBtnBookmarks.addEventListener("click" , function(){
    window.location = ("bookmarks.php");
})
let headerBtnBasket = document.getElementById("headerBtnBasket");
headerBtnBasket.addEventListener("click",function(){
    window.location = ("basket.php");
})