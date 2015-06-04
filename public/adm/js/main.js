$(function(){

	// Toggles class for radio buttons on tryouts form
	 $(".unchecked").click(function(){
	 	$(".checked").removeClass("checked");
	 	$(this).toggleClass("checked");
	 });

	 // Adds Class checked to label for radio buttons on tryouts form for editing
	 $("input:radio:checked").prev('label').addClass("checked");

});
