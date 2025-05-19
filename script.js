function adminPage(){
    window.location = "admin_page.php";
}
function userPage(){
    window.location = "userPage.php";
}

//print button code
document.getElementById("print-button").addEventListener("click", function() {
    window.print();
});
