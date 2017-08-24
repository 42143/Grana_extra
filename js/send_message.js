$(function() {

$('#newMessageSend').click(function() {
	var message = $('#newMessageContent').val();
	
	if (message != '') {
		$.ajax({
			data: {message: message },
			type: "GET",
			url: "send_message.php",
			success: function() {
				$('#newMessageContent').val('');
			}
		});
	}
});

});