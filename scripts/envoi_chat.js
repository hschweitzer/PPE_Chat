/*function scrollToBottom() {
	var messages = $("#messages")
	messages[0].scrollTop = messages[0].scrollHeight;
}
*/


//Dynamisation du Chat
$('#envoi').click(function(e){
	e.preventDefault();
    var message = encodeURIComponent( $('#message').val());
	
	$.ajax({
		url : document.URL + "&chat=envoi",
		type : "POST",
		data : "message=" + message
	});

	/*$('#messages').append("<p>Vous : " + decodeURIComponent(message) + "</p>");*/
	
});


/*
function updateChat(){
    //var premierID = $('#messages p:first').attr('id');
    $.ajax({
        type: "GET",
        url: charger.php,
        success: function(html){
            $('#messages').html(html);
        }
    })
}
setTimeout (updateChat, 2500);
*/
function charger(){

    setTimeout( function(){
    
        var premierID = $('#messages p:first').attr('id'); 
    
        $.ajax({
            url : "util/charger.php?id=" + premierID,
            type : "GET",
            success : function(html){
                $('#messages').prepend(html);
            }
        });
        charger();
    }, 1000);

}
    
    charger();
    