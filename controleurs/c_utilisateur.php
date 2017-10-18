<?php
	//if(isset($_SESSION['id_user']))
	//{
	//TODO : Quand l'utilisateur fini son inscription, supprimer le token dans la base.
		if(!isset($_REQUEST['action']))
		{
			$action = 'profil';
		}
		else
		{
			$action = $_REQUEST['action'];
		}
		switch ($action) {

			case 'profil':
				$profil = $Pdo->getUtilisateurParId($_SESSION['id_user']);
				$tousLesChiensUtilisateur = $Pdo->getTousLesChiensDunUtilisateur($_SESSION['id_user']);
				$finAbonnements = $Pdo->getFinAbonnements($profil["id"]);
				//var_dump($finAbonnements);
				$alerte = array();
				$i = 0;
				foreach($finAbonnements as $ew)
				{
					$alerte[] = " pour ".$finAbonnements[$i]["name"]." :<datefin> ".$finAbonnements[$i]["end_date"]."</datefin>";
					$i++;
				}
				include("vues/v_profil.php");
				if(isset($_POST['btn_appliquer']))
				{
					$id = 		$profil["id"];
					$password = $profil["password"];
					$prenom = 	$profil["first_name"];
					$nom = 		$profil["last_name"];
					$dateNaiss =$profil["birthdate"];
					
					$email = 	$_POST["txt_email"];
					$adresse = 	$_POST["txt_adresse"];
					$city = 	$_POST["txt_ville"];
					$cp = 		$_POST["txt_cp"];
					$phone = 	$_POST["txt_telephone"];
					
					$Pdo->updateUtilisateur($id, $prenom, $nom, $dateNaiss, $adresse, $cp, $city, $phone, $email, $password);
				}
				break;


			case 'finalisation':
				if (isset($_POST["validerMotDePasse"]))
				{
					if ($_POST["mdp"] == $_POST["repeter-mdp"]) {
				  	updateMotDePasse($_SESSION["id_user"], $_POST["mdp"]);
						deleteValidation($_GET["token"]);
						}
					else
						include("vues/v_finalisation.php");
				}

				if (isset($_GET["token"]))
				{
					$profil = getUtilisateurParToken($_GET["token"]);
					if ($profil["tokenTrouve"] == '1') {
						$_SESSION["id_user"] = $profil["id"];
						include("vues/v_finalisation.php");
					}
				}
				break;


			case 'reglement':
				include("vues/v_reglement.php");
				break;
		}
	//}
?>
