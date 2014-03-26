$(function() {
	$("#save").click(function(){
		var story = $( "textarea[name='story']" )[0].value;
		$.post('./saveDream.php', {story: story}, function(data){
			processData(data);
		});
	});
});

$(document).keydown(function(e){
    if (e.ctrlKey && e.keyCode == 13) {
       $("#save").click();
    }
});
