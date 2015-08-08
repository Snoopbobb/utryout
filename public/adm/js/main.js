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
			$(".post").attr('type', 'submit')
		}	 	
	});


});
