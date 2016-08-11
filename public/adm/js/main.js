'use strict';
$(function(){

	$(".radio").click(function(){
	 	$(".checked").removeClass("checked");
	 	$(this).toggleClass("checked");
	});

	$("input:radio:checked").prev('label').addClass("checked");

	$('a').each(function(){  
    	var ahref = $(this).attr('href');
    	var url = window.location.href;
  
    	if (ahref == url) {
      		$(this).addClass('active'); 
    	} 
  	});	

	$(".post").click(function(){
		var coupon = $(".coupon").val();

		if (coupon == "softball") {
			$(".post").attr('type', 'submit');
		}	 	
	});

	// Filter Code
	$('#filterForm').submit(false);

	$('#filter').keyup(function() {		
		var filter = $('#filter').val().toLowerCase();
		
		var contents = $('.tryout h3').contents();
		
		var count = contents.length;
		
		var tryoutCount = 0;
		for (i = 0; i < count; i++) {
			console.log(i);
			if(contents[i].data.toLowerCase().indexOf(filter) != -1) {
				$('#tryout' + i).removeClass('hidden');
				tryoutCount++;

			} else {
				$('#tryout' + i).addClass('hidden');
			}
		}
		if(filter === '') {
			$('.tryout').removeClass('hidden');
		}

		$('#tryoutCount').html(tryoutCount);

	});

	// RSVP popup form
	$('#rsvp.btn').on('click', function(e) {
		e.preventDefault();
		$('.form-popup').show(500);
	});

	// close popup when 'X' is clicked
	$('#close-popup').on('click', function(e) {
		e.preventDefault();
		$('.form-popup').hide(500);
	});

	// closes popup when clicked outside of popup box
	$(document).mouseup(function (e) {
     	var popup = $(".form-popup");
     		if (!$('#rsvp.btn').is(e.target) && !popup.is(e.target) && popup.has(e.target).length == 0) {
         popup.hide(500);
     	}
 	});


}); // End of document ready

var docWidth = document.documentElement.offsetWidth;

[].forEach.call(
  document.querySelectorAll('*'),
  function(el) {
    if (el.offsetWidth > docWidth) {
      //console.log(el);
    }
  }
);

 if(navigator.userAgent.match(/Trident\/7\./)) {
    $('body').on("mousewheel", function () {
        event.preventDefault();

        var wheelDelta = event.wheelDelta;

        var currentScrollPosition = window.pageYOffset;
        window.scrollTo(0, currentScrollPosition - wheelDelta);
    });

    $('body').keydown(function (e) {
        e.preventDefault(); // prevent the default action (scroll / move caret)
        var currentScrollPosition = window.pageYOffset;

        switch (e.which) {

            case 38: // up
                window.scrollTo(0, currentScrollPosition - 120);
                break;

            case 40: // down
                window.scrollTo(0, currentScrollPosition + 120);
                break;

            default: return; // exit this handler for other keys
        } 
    });
}
