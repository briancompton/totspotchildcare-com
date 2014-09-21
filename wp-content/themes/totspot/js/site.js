jQuery(function ($) {

$('.schedule-tour').click(function(){
	$('#wpcf7-f6-o1,#wpcf7-f48-o1').slideToggle();
	$(this).removeClass('btn btn-info');
	$('.wpcf7-form').find('input, textarea').first().focus()
})

$('.parent-testimonial').first().addClass('current')

var divs = $('.parent-testimonial');

function fade() {
    var current = $('.current');
    var currentIndex = divs.index(current),
        nextIndex = currentIndex + 1;

    if (nextIndex >= divs.length) {
        nextIndex = 0;
    }

    var next = divs.eq(nextIndex);

    next.stop().fadeIn(1500, function() {
        $(this).addClass('current');
    });

    current.stop().fadeOut(1000, function() {
        $(this).removeClass('current');
        setTimeout(fade, 7000);
    });
}

fade();


// ***** Hover effects for classrooms ***** //

$('.multi-color li:nth-child(1)').hover(function(){
  $('.multi-color li:nth-child(1) a').text(':)')},
  function(){
  $('.multi-color li:nth-child(1) a').text('Infants & Toddlers')
})

$('.multi-color li:nth-child(2)').hover(function(){
  $('.multi-color li:nth-child(2) a').text('2')},
  function(){
  $('.multi-color li:nth-child(2) a').text('Two year-olds')
})

$('.multi-color li:nth-child(3)').hover(function(){
  $('.multi-color li:nth-child(3) a').text('3')},
  function(){
  $('.multi-color li:nth-child(3) a').text('Three year-olds')
})


$('.multi-color li:nth-child(4)').hover(function(){
  $('.multi-color li:nth-child(4) a').text('K')},
  function(){
  $('.multi-color li:nth-child(4) a').text('Pre-K / VPK')
})



$( selector ).hover( handlerIn, handlerOut )


// ***** Logo flipper for demo *****//

/*

$('.site-logo').click(function(e){

	var current = $('.site-logo img').attr("src");
	var day = "http://totspot.graybeetle.com/wp-content/themes/totspot/img/ts-logo-1.png";
	var night = "http://totspot.graybeetle.com/wp-content/themes/totspot/img/ts-logo-vpk.png";
	
	e.preventDefault();
	
	if( current == night ) {
	$('.site-logo img').attr("src",day);
	}
	
	if( current == day ) {
	$('.site-logo img').attr("src",night);
	}
})
*/




}); // Close jQuery wrapper


