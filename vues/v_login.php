<div id="connexion" class="form-sign-up">
	<div class="sign-up" id="connexion">
		<div class="form-header">
			<i class="fa fa-times" aria-hidden="true" onclick="hideConnexion()"></i>
		</div>
		<form method="POST" action="index.php?uc=login&action=connexion">		
			<div id="login_client" class="client show">
				<input id="login_email" type="text" name="txt_email" placeholder="Adresse E-Mail" />
				<?php
					if(isset($_SESSION['erreur']))
					{
						echo '<script type="text/javascript">',
						'showConnexion();',
						'</script>';
						echo"<error id=\"login_error\">";
						echo $_SESSION['erreur'];
						unset($_SESSION["erreur"]);
						echo "</error>";
						?>
						<style>
						#login_error{
							order: 1;
						}
						#login_email{
							order: 2;
						}
						#login_password{
							order: 3;
						}
						#login_submit{
							order: 4;
						}
						</style>
						<?php
					}
				?>
				<input id="login_password" type="password" name="txt_mdp" placeholder="Mot de passe" />
				<input id="login_submit" type="submit" name="btn_connexion" value="Se Connecter" />
			</div>
		</form>
	</div>
</div>