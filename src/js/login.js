$(function() {
	$("#login").click(function(){
		var name = $("#input_name")[0].value;
		var pwd = $("#input_pwd")[0].value;
		$.post('./createSession.php', {name: name, pwd: pwd}, function(data){
			if(data == "1")
				window.location = "http://www.jrobcomputers.com/REM";
			else
				processData(data);
		});
	});
});

$(document).keydown(function(e){
    if (e.keyCode == 13) { 
       $("#login").click();
       return false;
    }
});

window.onload = function(){
	document.getElementById("input_name").focus();
};