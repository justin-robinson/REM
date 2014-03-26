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
		flash.fadeOut(5000);
	});
}

function processData(data){
	if(data == "-1")
		window.location = "http://www.jrobcomputers.com/REM";
	else
		showFlash(data);
}
