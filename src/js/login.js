$(function() {
	$("#login").click(function(){
		var name = $("#input_name")[0].value;
		var pwd = $("#input_pwd")[0].value;
		$.post('./createSession.php', {name: name, pwd: pwd}, function(data){
			if(data == "1")
				window.location = "http://rem.jrobcomputers.com";
			else
				alert(data);
		});
	});
});
