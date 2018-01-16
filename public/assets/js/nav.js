// var target = document.querySelector('.main');
// var button = document.querySelector('.nav-button');

// // click-touch event
// (function() {

//     // old browser or not ?
//     if ( !('querySelector' in document && 'addEventListener' in window) ) {
//     return;
//     }
//     window.document.documentElement.className += ' js-enabled';
    
//     function toggleNav() {
    
//     // Define targets
//     var target = document.querySelector('.main');
//     var button = document.querySelector('.nav-button');
    
//     // click-touch event
//     if ( button ) {
//       button.addEventListener('click', 
//       function (e) { 
//         target.classList.toggle('is-opened'); 
//         e.preventDefault();
//       }, false );
//     }
//     } // end toggleNav()
    
//     toggleNav();
//     }());

jQuery(function($){
    $( '.menu-btn' ).click(function(){
    $('.responsive-menu').toggleClass('expand')
    })
})