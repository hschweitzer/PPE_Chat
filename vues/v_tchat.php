


<div id="live-chat">
		<header class="clearfix">
			<h4>
			<?php
				if(isset($_POST['admin']))
				{
					?>
			Répondre à un utilisateur
					<?php
				}
			?>
			Contacter l'administrateur</h4>
		</header>
		<div class="chat">
			<div class="chat-history" id="messages">
				<div class="chat-message clearfix">
					<!-- Messages ici -->
				</div> <!-- end chat-message -->
			</div> <!-- end chat-history -->

		

			<?php
			$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	if(isset($_SESSION['admin']))
	{
		?>
		<div class="chat-form">
		<?php echo"<form method=\"POST\" action=\"$link&chat=select\">"; ?>
		<select name="select_user">
		<option value="" disabled selected hidden>Utilisateur</option>
		<?php
			foreach ($lesUsers as $value) {
				echo '<option value="' . $value['email']. '">' . $value['email'] . '</option>';
			}
		?>
	</select>
	<input type="submit" name="btn_user" value="Sélectionner" />
	</form>
	</div>
	<?php
	}
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
				if(!isset($_SESSION['id_user']) && !isset($_SESSION['admin']))
				{
					?>

				<form method="POST" action="">
					<div class="chat-form">
						<input type="submit" name="btn_logout" value="Quitter le tchat" />
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
			<input type="submit" name="btn_email" value="Utiliser l'adresse mail" />
		</div>
	</form>
	<?php
	}
	?>

		</div> <!-- end chat -->

	</div> <!-- end live-chat -->
<?php
/*
?>
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
             


	<!--////les messages du tchat////// -->

<!--

    </div>
	<?php
	/*
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
	
	</div>
	*/
	?>