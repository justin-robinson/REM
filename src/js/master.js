$(function() {
	$("#logout").click(function(){
		$.post('./destroySession.php', function(data){
			window.location = "http://rem.jrobcomputers.com";
		});
	});
});
var flash = $('#flash');
flash.hide();
function showFlash(data){
	var alert = flash[0].firstElementChild;
	alert.innerHTML=data;
	flash.fadeIn("fast", function(){
//		flash.fadeOut(5000);
	});
}
