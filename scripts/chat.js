var messages = $("#messages")
//remet le défilement en bas au chargement de la page
messages[0].scrollTop = messages[0].scrollHeight;

(function() {

	$('#chat show').on('click', function() {

		$('.chat').slideToggle(300, 'swing');
		$('.chat-message-counter').fadeToggle(300, 'swing');

	});

	$('.chat-close').on('click', function(e) {

		e.preventDefault();
		$('#live-chat').fadeOut(300);

	});

}) ();