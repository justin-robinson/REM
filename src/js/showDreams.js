$(function() {
	$("#delete").click(function(){
		var button = this;
		var id = button.value;
		$.post('./deleteDream.php', {id: id}, function(data){
			if(data == "Deleted"){
				var parent=$(button)[0].parentNode.parentNode;
				var temp=$(parent).slideUp();
			}
		});
	});
});

$(function() {
	$(".panel-body").dblclick(function() {
		var textarea=this.firstElementChild;
		if(textarea.readOnly)
			textarea.readOnly = false;
		else{
			textarea.readOnly = true;
			var id = this.previousElementSibling.lastElementChild.value;
			$.post('./saveDream.php', {story: textarea.value, dream_index: id}, function(data){
				showFlash(data);
			});
		}
	});
});
