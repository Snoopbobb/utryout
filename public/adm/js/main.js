$(function(){

	 $("a").each(function(){
               if ($(this).attr("href") == window.location.pathname){
                       $(this).addClass("active");
               }
       });

	 $(".unchecked").click(function(){
	 	$(".checked").removeClass("checked");
	 	$(this).toggleClass("checked");
	 });

	 $("input:radio:checked").prev('label').addClass("checked");
});
