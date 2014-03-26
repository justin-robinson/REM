$(function() {
	$(".btn-danger").click(function(){
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

var activeStoryID = null;
var dbStoryContent = null;

$(function() {
	$(".panel-body").dblclick(function() {
		var id = this.id.match(/\d+$/)[0];
		this.className += " editing";
		var textarea=this.firstElementChild;
		if(textarea.readOnly){//not editing
			textarea.readOnly = false;
			if(activeStoryID != null){// clicked a dream while editing another
				updateDream(activeStoryID);
			}
			activeStoryID = id;
			dbStoryContent = textarea.value;
		}
		else{//actively editing this dream
			updateDream(id);
		}
	});
});

function updateDream(id) {
	var textarea = $('#s'+id)[0];
	textarea.readOnly = true;
	activeStoryID = null;
	if (textarea.value != dbStoryContent){
		$.post('./saveDream.php', {story: textarea.value, dream_index: id}, function(data){
			processData(data);
		});
	}
	else{
		showFlash("No change detected");
	}
	var panel = $('#b'+id)[0];
	panel.className = "panel-body";
}