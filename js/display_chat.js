$(function() {

var scrollHeightOfChatBox = document.getElementById('chatArea');

setInterval(function() {
	$('#chatArea').load('display_messages.php');
	scrollHeightOfChatBox.scrollTop = scrollHeightOfChatBox.scrollHeight;
	//$('#chatArea').scrollTop( scrollHeightOfChatBox );
}, 500);

});