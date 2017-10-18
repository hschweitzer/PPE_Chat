<?php
	if(isset($_SESSION['admin']))
	{
		if (!isset($_GET['action']))
      $action = "default";
    else {
      $action = $_GET['action'];
    }
		switch($action)
		{
			case 'valider' :
				$Pdo->validerUtilisateur($_POST["id"]);
				lancement_finalisation_inscription($Pdo, $_POST["id"], $_POST["email"], $_POST["nom"]);
				break;
			case 'supprimer' :
				$utilisateur = $Pdo->getUtilisateurParId($_GET["id"]);
				echo '<span class="admin-verif">Voulez vous vraiment supprimer l\'utilisateur '.$utilisateur["first_name"].' '.$utilisateur["last_name"].' ? <a class="button red medium-margin" href="index.php?uc=admin&action=confirmer_suppr&id='.$_GET["id"].'">Confirmer</a><a class="button medium-margin" href="index.php?uc=admin">Annuler</a></span>';
			case 'confirmer_suppr' :
				$Pdo->deleteUtilisateur($_GET["id"]);
				break;
			case 'renouveler' :
				renouvelerAbonnement($Pdo, $_GET["iduser"], $_GET["idchien"]);
				break;
		}
		$tousLesProfilsAValider = $Pdo->getTouslesProfilsAValider();
		$tousLesProfilsValides = $Pdo->getTousLesUtilisateursValides();
		include("vues/v_main_admin.php");
	}
	else {
		header("Location:index.php?uc=login&action=connexion_admin");
	}
?>
