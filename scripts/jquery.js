// This function will scroll to the container div

	$(document).ready(function() {

		// NAV MENU
		$(".bar-container").click(function(){
			$(".menu_header").slideToggle("slow",function(){
				// ADD CLASS
				$(this).toggleClass("menu_header_expanded").css('display', '');
			});
		});
		

		// CAROUSEL
		$('#myCarousel2').carousel({
		  interval: 100000
		});

		$('.carouselTeam .itemTeam').each(function(){
		  var next = $(this).next();
		  if (!next.length) {
		    next = $(this).siblings(':first');
		  }
		  next.children(':first-child').clone().appendTo($(this));
		  
		  if (next.next().length>0) {
		    next.next().children(':first-child').clone().appendTo($(this));
		  }
		  else {
		    $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
		  }
		});

		//SLIDE TO DIV
		$('html,body').animate({
			scrollTop: $(".container").offset().top
		});

		
	});
