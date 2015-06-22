$(document).ready(function(){
  $('.blog-slider').bxSlider({
  	mode: 'fade',
  	pagerSelector: '.pager',
  	nextSelector: '.next',
  	prevSelector: '.prev'
  });
});

$(document).ready(function(){
	$('.answer').hide();
	$('.question h3').each(function(){
	  $(this).click(function(){
	  	$(this).toggleClass('active');
	  	$(this).siblings('.answer').slideToggle();
	  });
	});
});

$(document).ready(function(){
	var sidebarTop = $('.page-content').offset().top;
	var sidebarHeight = $('.sidebar').outerHeight();
	var $sidebarBottom = sidebarTop + sidebarHeight - ($(window).height() - 250);
	if($(window).width() > 700 && $('.page-content').height() > sidebarHeight) {
		$(window).on('scroll', function() {
			var $sidebarPos = ($(window).width() - $('.page-content').width()) / 2;
			var $sidebarWidth = ($('.page-content').width() * 23.4) / 100;
			var $sidebarW = Math.ceil($sidebarWidth);

			if ($(window).scrollTop() > $sidebarBottom && $('.page-content').height() > sidebarHeight) {
			    $('.sidebar').addClass('fixed');
			    $('.sidebar').css({'right' : $sidebarPos});
			} else {
			    $('.sidebar').removeClass('fixed');
			    $('.sidebar').css({'right' : 'auto', 'width' : '220px'});
			}

		});
	}
});

$(document).ready(function() {
    $('.scroll-top').click(function() {
        $('body,html').animate({scrollTop:0},600);
    });
}); 

/*$(document).ready(function() {
	var $marginLefty = $('.menu-right');
	$marginLefty.css('top', $('.main-header').outerHeight());
	$('.menu-anchor').click(function() {
		$marginLefty.animate({
			marginRight: parseInt($marginLefty.css('marginRight'),10) == 0 ? -$marginLefty.outerWidth() : 0
		});
		$(this).toggleClass('menu-active');
	});
	$(window).resize(function(){
		if($(window).width() > 850) {
			$marginLefty.css('marginRight', 0);
		} else {
			$marginLefty.css('marginRight', -1000);
		}
		$('.menu-anchor').removeClass('menu-active');
		$marginLefty.css('top', $('.main-header').outerHeight());
	});
});*/


$(document).ready(function() {
	var $marginLefty = $('.menu-right');
	$marginLefty.css('top', $('.main-header').outerHeight());
	$('.menu-anchor').click(function() {
		$marginLefty.slideToggle();
		$(this).toggleClass('menu-active');
	});
	$(window).resize(function(){
		if($(window).width() > 850) {
			$marginLefty.css('display', 'block');
		} else {
			$marginLefty.css('display', 'none');
		}
		$('.menu-anchor').removeClass('menu-active');
	});
});

