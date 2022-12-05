// $(document).ready(function () {
//     "use strict";
//     $("body").on("contextmenu", function (e) {
//         return false;
//     });
//     $(document).keydown(function (e) {
//         if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117)) {
//             return false;
//         }
//         if (e.which === 123) {
//             return false;
//         }
//         if (e.metaKey) {
//             return false;
//         }
//         if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
//             return false;
//         }
//         if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
//             return false;
//         }
//         if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
//             return false;
//         }
//         if (e.keyCode == 224 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
//             return false;
//         }
//         if (e.ctrlKey && e.keyCode == 85) {
//             return false;
//         }
//         if (event.keyCode == 123) {
//             return false;
//         }
//     });
//     $(".sidebar-widget .nav-link").on('click', function (event) {
//         if (this.hash !== "") {
//             event.preventDefault();
//             var hash = this.hash;
//             $('html, body').animate({
//                 scrollTop: $(hash).offset().top
//             }, 800, function () {
//                 window.location.hash = hash;
//             });
//         }
//     });
// });

