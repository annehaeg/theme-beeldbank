// // Anonymous function executed when document loaded
// (function() {
//
//     document.getElementById('navigation-toggle').addEventListener('click',function(){
//         document.getElementById('offcanvas_list').classList.toggle('offcanvas-open');
//         this.focus();
//     });
//
//     document.getElementById('navigation-toggle').addEventListener('blur', function() {
//         document.getElementById('offcanvas_list').classList.remove('offcanvas_open');
//         return false;
//     });
//
//
// })();


function navToggle(){
    var nav = document.getElementById('navigation-toggle');
    nav.classList.toggle("navopen");
}
//
// $(document).click(function(event) {
//     if (event.target.id === "hamburgermenu") {
//         // Don't remove class.
//     } else {
//         $('.home.active').click();
//         $('.home').removeClass("active");
//     }
// });


function openMenu(evt, menuName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(menuName).style.display = "block";
    evt.currentTarget.className += " active";
}