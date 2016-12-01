var pwd_regex = /(?=^.{8,}$)(?=.*\d.*\d)(?=.*[a-zA-Z].*[a-zA-Z])(?=.*[!@#$%^;*()_+}{&":;'?\/><])(?!.*\s).*$/;
$(function() {
	$("#logout").click(function(){
		$.post('./post/destroySession.php', function(data){
			window.location = "/";
		});
	});
});
var flash = $('#flash');
function showFlash(data){
	var alert = flash[0].firstElementChild;
	alert.innerHTML=data;
	flash.fadeIn("fast", function(){
		flash.fadeOut(5000);
	});
}
function processData(data){
	if(data == "-1")
		window.location = "/";
	else
		showFlash(data);
}
function isPwd(pwd, notify){
	var ispwd = pwd_regex.test(pwd);
	if(!ispwd && notify)
		showFlash("Password must be 8 characters, with 2 digts, 2 letters, and 1 special character");
	return ispwd;
}
