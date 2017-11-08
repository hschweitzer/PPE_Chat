<div id="tchat" class="chatshow">
	<div class="info">
		Contacter un administrateur :
	</div>
	<div id="messages" class="messages">
		<p>test de message (directement en hmtl)</p>
		<p>test d'un autre message (aussi directement en html)</p>
		<p>test d'un message plus long avec aussi un test de mot très long : zahfieoigbiergbiezabgubeuiagbehgaobrkebuirgauoheoziafhçezihnfigezbgupebzg</p>
		<p>test de message (directement en hmtl)</p>
		<p>test d'un autre message (aussi directement en html)</p>
		<p>test d'un message plus long avec aussi un test de mot très long : zahfieoigbiergbiezabgubeuiagbehgaobrkebuirgauoheoziafhçezihnfigezbgupebzg</p>
		<p>test de message (directement en hmtl)</p>
		<p>test d'un autre message (aussi directement en html)</p>
		<p>test d'un message plus long avec aussi un test de mot très long : zahfieoigbiergbiezabgubeuiagbehgaobrkebuirgauoheoziafhçezihnfigezbgupebzg</p>
		<p>test de message (directement en hmtl)</p>
		<p>test d'un autre message (aussi directement en html)</p>
		<p>test d'un message plus long avec aussi un test de mot très long : zahfieoigbiergbiezabgubeuiagbehgaobrkebuirgauoheoziafhçezihnfigezbgupebzg</p>
		<p>test de message (directement en hmtl)</p>
		<p>test d'un autre message (aussi directement en html)</p>
		<p>test d'un message plus long avec aussi un test de mot très long : zahfieoigbiergbiezabgubeuiagbehgaobrkebuirgauoheoziafhçezihnfigezbgupebzg</p>
		<p>test de message (directement en hmtl)</p>
		<p>test d'un autre message (aussi directement en html)</p>
		<p>test d'un message plus long avec aussi un test de mot très long : zahfieoigbiergbiezabgubeuiagbehgaobrkebuirgauoheoziafhçezihnfigezbgupebzg</p>
		<p>test de message (directement en hmtl)</p>
		<p>test d'un autre message (aussi directement en html)</p>
		<p>test d'un message plus long avec aussi un test de mot très long : zahfieoigbiergbiezabgubeuiagbehgaobrkebuirgauoheoziafhçezihnfigezbgupebzg</p>
		<p>test de message (directement en hmtl)</p>
		<p>test d'un autre message (aussi directement en html)</p>
		<p>test d'un message plus long avec aussi un test de mot très long : zahfieoigbiergbiezabgubeuiagbehgaobrkebuirgauoheoziafhçezihnfigezbgupebzg</p>
		<p>test de message (directement en hmtl)</p>
		<p>test d'un autre message (aussi directement en html)</p>
		<p>test d'un message plus long avec aussi un test de mot très long : zahfieoigbiergbiezabgubeuiagbehgaobrkebuirgauoheoziafhçezihnfigezbgupebzg</p>
		<p>test de message (directement en hmtl)</p>
		<p>test d'un autre message (aussi directement en html)</p>
		<p>test d'un message plus long avec aussi un test de mot très long : zahfieoigbiergbiezabgubeuiagbehgaobrkebuirgauoheoziafhçezihnfigezbgupebzg</p>
		<p>test de message (directement en hmtl)</p>
		<p>test d'un autre message (aussi directement en html)</p>
		<p>test d'un message plus long avec aussi un test de mot très long : zahfieoigbiergbiezabgubeuiagbehgaobrkebuirgauoheoziafhçezihnfigezbgupebzg</p>
		<p>test de message (directement en hmtl)</p>
		<p>test d'un autre message (aussi directement en html)</p>
		<p>test d'un message plus long avec aussi un test de mot très long : zahfieoigbiergbiezabgubeuiagbehgaobrkebuirgauoheoziafhçezihnfigezbgupebzg</p>
            <!-- les messages du tchat -->
    </div>
	<?php
	if(isset($_SESSION["chat_user"]))
	{
	?>
	<form method="POST" action="index.php?uc=tchat&action=envoi">
		<div class="chat-form">
			<?php
			echo "<div class=\"pseudo\">Pseudo utilisé : ".$_SESSION['chat_user']."</div>";	
			?>
			<div/>Message : </div><textarea name="message" id="message"></textarea>

			<input type="submit" name="submit" value="Envoyez votre message !" id="envoi" />
		</div>
	</form>

	<?php
	}
	else 
	{	
	?>
	<form method="POST" action="index.php?uc=tchat&action=login">
		<div class="chat-form">
			<div>Pseudo :</div><input type="text" name="pseudo" id="pseudo" />
			<input type="submit" name="submit" value="Valider le pseudo" id="envoi" />
		</div>
	</form>
	<?php
	}
	?>
</div>