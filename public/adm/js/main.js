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

	// var images = ['../../../../../img/catcher.jpg', '../../../../../img/arial-field.jpg'];
	// $('body').css({'background-image': 'url(images/' + images[Math.floor(Math.random() * images.length)] + ')'});

	// $('body').vegas({
 //    	slides: [
	//         { src: '/img/catcher.jpg' },
	//         { src: '/img/arial-field.jpg' },
	//         { src: '/img/slide3.jpg' },
	//         { src: '/img/slide4.jpg' }
 //    	]
	// });

	// $('body').vegas({
 //    delay: 7000,
 //    timer: true,
 //    shuffle: true,
 //    transition: 'slideDown2',
 //    transitionDuration: 2000,
 //    slides: [
 //        { src: '../../../img/catcher.jpg', transition: 'fade' },
 //        { src: '../../../img/arial-field.jpg' }
 //    	]
	// });

});


// function initialize() {
//   var mapProp = {
//     center:new google.maps.LatLng(51.508742,-0.120850),
//     zoom:5,
//     mapTypeId:google.maps.MapTypeId.ROADMAP
//   };
//   var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
// }
// google.maps.event.addDomListener(window, 'load', initialize);

