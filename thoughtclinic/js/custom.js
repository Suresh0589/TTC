/*$(document).ready(function(){
	
  // Add scrollspy to <body>
  $('body').scrollspy({target: ".navbar", offset: 100});   

  // Add smooth scrolling on all links inside the navbar
  $("nav a.scroll").on('click', function(event) {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top-92
    }, 800, function(){
   
      // Add hash (#) to URL when done scrolling (default click behavior)
     /* window.location.hash = hash;*/
    /*});
  });
});*/

function strip(html)
{
   var tmp = document.createElement("DIV");
   tmp.innerHTML = html;
   return tmp.textContent||tmp.innerText;
}

$(document).ready(function(){
$('.navbar-collapse a').click(function(){
    $(".navbar-collapse").collapse('hide');
});
});




// Tooltip Plugin
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});






