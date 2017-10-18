<div id="profile">
	<div class="profile">
		<div class="picture">
			<div class="container">
				<img src="error404.png" onerror="this.src='images/default-profile.png';" width="200px" height="200px">
				<!-- TODO insérer l'image envoyée par l'utilisateur -->
			</div>
		</div>
		<div class="info" >
			<div class="form-profil" id="form_reload">
				<fieldset id="form_disable" disabled="disabled">
					<form method="post" action="">
						<div id="profil_maitre" class="profil-maitre">
							<h3>
								Les informations du maître
							</h3>
							<input  disabled type="text" name="txt_nom" value="<?php echo $profil["last_name"]; ?>" placeholder="Votre nom" />
							<input  disabled type="text" name="txt_prenom" value="<?php echo $profil["first_name"]; ?>" placeholder="Votre prénom" />
							<input type="text" name="txt_telephone" value="<?php echo $profil["phone"]; ?>" placeholder="Votre numéro de téléphone" />
							<input  disabled type="date" name="txt_naiss" value="<?php echo $profil["birthdate"]; ?>" placeholder="Votre date de naissance" />
							<input  type="text" name="txt_email" value="<?php echo $profil["email"]; ?>" placeholder="Votre adresse email" />
							<input type="text" name="txt_adresse" value="<?php echo $profil["address"]; ?>" placeholder="Votre adresse" />
							<input type="text" name="txt_cp" value="<?php echo $profil["zip_code"]; ?>" placeholder="Votre code postal" />
							<input type="text" name="txt_ville" value="<?php echo $profil["city"]; ?>" placeholder="Votre ville" />
						</div>
						<div class="modify">
							<div id="enable_form" class="default-button" onclick="enableForm()">
								Modifier des informations
							</div>
							<div id="disable_form" class="default-button no-display" onclick="disableForm()">
								Annuler les modifications
							</div>
							<input id="apply_changes" class="default-button no-display" type="submit" name="btn_appliquer" value="Appliquer les changements";/>
						</div>
					</form>
					
					<h3>
						Les informations du/des chien(s)
					</h3>
					<?php foreach($tousLesChiensUtilisateur as $key => $chien): ?>
					<form method="post" action="">
						<div id="profil_chien" class="profil-chien">
							<?php
								//TODO générere autant de chiens que nécessaire
							?>
								<input  disabled type="text" name="txt_nom_chien" value="<?php echo $chien["name"]; ?>" placeholder="Le nom du chien" />

								<label>Date de naissance</label><input  disabled type="date" name="date_naiss_chien" value="<?php echo $chien["birthdate"]; ?>" />

								<input  disabled type="text" name="txt_race" value="<?php echo $chien["race"]; ?>" placeholder="Tatouage du chien" />

								<div class="lof__div">
									<label class="lof__label" for="checkbox_id">Chien L.O.F</label>
									<input disabled type="checkbox" name="cbx_lof" <?php if(strlen($chien["lof_number"]) > 1) { echo "checked "; } ?>id="checkbox_id"/>
								</div>
								<input disabled type="text" name="txt_lof" value="<?php echo $chien["lof_number"]; ?>" placeholder="Numéro de L.O.F" >
								<label>Date de vaccination</label><input type="date" name="date_vacc" value="<?php echo $chien["vaccine_date"]; ?>"/>
						</div>
					</form>
					<?php endforeach; ?>
				</fieldset>
			</div>			
		</div>
		<div class="reminder">
			<h3>
				<u>Alertes concernant votre compte :</u>
			</h3>
			<?php
				if(isset($alerte))
				{
					?>
					<div class="warning">
					<?php
					// Peut nécessiter des conditions supplémentaires pour d'autres types d'alertes
					foreach($alerte as $value) {
						echo "<div>Fin de la souscription".$value."</div>";
					  }
					?>
					</div>
					<?php
				}
				else 
				{
					echo "Aucune alerte concernant votre compte";
				}
			?>
		</div>
	</div>	
</div>