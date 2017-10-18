<!-- TODO (?) include v_insciption peu importe la page actuelle
		pour qu'elle apparaisse au dessus de la page (en fixed) -->
<div id="inscription" class="form-sign-up">
	<div class="sign-up">
		<div class="form-header">
			<i class="fa fa-times" aria-hidden="true" onclick="hideInscription()"></i>
		</div>
		<form method="POST" action="index.php?uc=login&action=inscription">
			<div id="signup_client" class="client show first-show">
				<h3>
					Informations du propriétaire :
				</h3>

				<input id="signup_name" type="text" name="txt_nom" placeholder="Nom" />
				<input type="text" name="txt_prenom" placeholder="Prénom" />
				<label>Date de Naissance</label> <!-- TODO améliorer légende input type date -->
				<input type="date" name="date_naissance" />
				<input type="text" name="txt_email" placeholder="Adresse E-Mail" />
				<input type="text" name="txt_telephone" placeholder="Numéro de télephone" />

				<div class="form-change">
					<div class="default-button" onclick="nextStep()">
						Suite&nbsp;
						<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
					</div>
				</div>

			</div>

			<div id="signup_chien" class="chien">
				<label for="estFamille">Me rattacher à un membre existant :</label>
				<input type="checkbox" name="estFamille" id="estFamille" bool="true" onclick="formActivateFamille($(this).attr('bool')); if($(this).attr('bool') == 'true') { $(this).attr('bool', 'false'); } else { $(this).attr('bool', 'true'); }"></input>
				<label for="token-membre" style="width:250px;padding:5px 0;">Entrez ici le code à 6 caractères indiqué sur le profil du compte auquel vous voulez vous rattacher :</label>
				<input type="text" name="txt_token" id="token-membre" disabled>
				<fieldset id="form_chien_disable">
					<h3>
						Informations du Chien :
					</h3>

					<input type="text" name="txt_nom_chien" placeholder="Nom du Chien" />
					<select name="select_race">
						<option value="" disabled selected hidden>Race</option>
						<?php
							foreach ($lesRaces as $value) {
								echo '<option value="' . $value["name"] . '">' . $value["name"] . '</option>';
							}
						?>
					</select>
					<label>Date de Naissance du Chien</label>
					<input type="date" name="date_naissance_chien" />
					<input type="text" name="txt_tatouage" placeholder="Numéro de Tatouage ou Puce" />
					<div class="lof__div">
						<label class="lof__label" for="checkbox_id">Chien L.O.F</label><input type="checkbox" name="cbx_lof" id="checkbox_id" onclick="activateTxtLof($(this).attr('bool')); if($(this).attr('bool') == 'true') { $(this).attr('bool', 'false'); } else { $(this).attr('bool', 'true'); }"/>
					</div>

					<input type="text" name="txt_lof" placeholder="Numéro de L.O.F" id="txt-lof" />
					<!-- TODO empêcher saisie LOF si cbx_lof non coché -->
					</fieldset>
					<input type="submit" name="btn_valider_insc" value="Envoyer">
					<div class="form-change">
						<div class="default-button" onclick="previousStep()">
							Précédent&nbsp;
							<i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
						</div>
					</div>
				</div>
		</form>

	</div>
</div>
