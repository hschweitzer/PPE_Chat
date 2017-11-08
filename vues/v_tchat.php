<div id="tchat" class="chat show">
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
	$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if(isset($_SESSION["chat_user"]))
	{
	echo"<form method=\"POST\" action=\"$link&chat=envoi\">";
	?>
		<div class="chat-form">
			<?php
			echo "<div class=\"pseudo\">Pseudo utilisé : ".$_SESSION['chat_user']."</div>";	
			?>
			<div/>Message : </div>
			<textarea name="message" id="message"></textarea>
			<input type="submit" name="btn_message" value="Envoyez votre message !" id="envoi" />
			
		</div>
	</form>
			<?php
				if(!isset($_SESSION['id_user']))
				{
					?>

				<form method="POST" action="">
					<div class="chat-form">
						<input type="submit" name="btn_logout" value="Quitter le tchat" id="envoi" />
					</div>
				</form>
					<?php
				}
			?>
	<?php
	}
	else 
	{	
	echo"<form method=\"POST\" action=\"$link&chat=login\">";
	?>
		<div class="chat-form">
			<div>Adresse mail :</div><input type="text" name="email" id="pseudo" />
			<input type="submit" name="btn_email" value="Utiliser l'adresse mail" id="envoi" />
		</div>
	</form>
	<?php
	}
	?>
</div>