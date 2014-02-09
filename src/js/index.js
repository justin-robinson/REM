$(function() {
	$("#save").click(function(){
		var story = $( "textarea[name='story']" )[0].value;
		$.post('./saveDream.php', {story: story}, function(data){
			showFlash(data);
		});
	});
});
