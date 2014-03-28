var input_name, input_pwd, input_pwd_confirm;
$(function() {
	$("#register").click(function(){
		var name = input_name.value.trim();
		var pwd = input_pwd.value.trim();
		var pwd_confirm = input_pwd_confirm.value.trim();
		if(name != "" && pwd==pwd_confirm && isPwd(pwd, true)){
			$.post('./post/createDreamer.php', {name: name, pwd: pwd}, function(data){
				if(data == "1")
					window.location = "./";
				else
					processData(data, true);
			});
		}
	});
});

$(document).keydown(function(e){
    if (e.keyCode == 13) { 
       $("#register").click();
       return false;
    }
});
window.onload = function(){
	input_name = document.getElementById("input_name");
	input_pwd = document.getElementById("input_pwd");
	input_pwd_confirm = document.getElementById("input_pwd_confirm");
	input_name.focus();
};