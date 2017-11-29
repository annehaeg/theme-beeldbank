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
