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

	 $("#add-component").click(function(e){
	 	e.preventDefault();
	 	$("MyComponent").append(".age");
	 	alert("clicked");
	 });
	
	// Extend Vue to get a reusable constructor
	var MyComponent = Vue.extend({
	  template: 'A custom component!'
	})

});
