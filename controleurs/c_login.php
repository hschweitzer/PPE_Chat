<?php
//TODO : Verifications dans les formulaires pop-up: déjà connecté ?
if (isset($_REQUEST['action'])) {
	$action = $_REQUEST['action'];
}
	if(!(isset($_SESSION['id_user']) || isset($_SESSION['admin'])))
	{
		if (isset($_REQUEST['action'])) {
			$action = $_REQUEST['action'];
			switch($action)
			{
				case 'connexion_admin':
					include("vues/v_login_admin.php");
					break;


				case 'admin_validation':
					if (isset($_POST["ok_admin"]))
					{
						if ($Pdo->connexion_admin($_POST["identifiant"], $_POST["motdepasse"]))
						{
							$_SESSION["admin"] = $_POST["identifiant"];
							?><script type="text/javascript">window.location.href = 'index.php?uc=admin';</script> <?php
						}
					}
					break;


				case 'inscription': //FIXME
					if (isset($_POST["btn_valider_insc"]) && isset($_POST["estFamille"]))
					{
						ajouterUtilisateurFamille($Pdo, $_POST["txt_prenom"], $_POST["txt_nom"], $_POST["date_naissance"], $_POST["txt_email"], $_POST["txt_telephone"], $_POST["txt_token"]);
					}
					else if (isset($_POST["btn_valider_insc"]) && isset($_POST["cbx_lof"]))
					{
						ajouterUtilisateur($Pdo, $_POST["txt_prenom"], $_POST["txt_nom"], $_POST["date_naissance"], $_POST["txt_email"], $_POST["txt_telephone"], $_POST["txt_nom_chien"], $_POST["select_race"], $_POST["date_naissance_chien"], $_POST["txt_tatouage"], $_POST["txt_lof"]);
					}
					else if ($_POST["btn_valider_insc"]) {
						ajouterUtilisateurSansLof($Pdo, $_POST["txt_prenom"], $_POST["txt_nom"], $_POST["date_naissance"], $_POST["txt_email"], $_POST["txt_telephone"], $_POST["txt_nom_chien"], $_POST["date_naissance_chien"], $_POST["txt_tatouage"]);
					}
					break;


				case 'connexion':
					if (isset($_POST["btn_connexion"]))
					{
						switch (connexionUtilisateur($Pdo, $_POST["txt_email"], $_POST["txt_mdp"])) {
							case 1:
								echo "<script>location.href=\"index.php?uc=accueil\"</script>";
								break;
							case 0:
								$_SESSION['erreur'] = "Les informations saisies sont erronées";
								echo "<script>location.href=\"index.php?uc=accueil\"</script>";
								break;
							case 2:
								$_SESSION['erreur'] = "Votre compte n'a pas encore été validé par un administrateur";
								echo "<script>location.href=\"index.php?uc=accueil\"</script>";
								break;
						}
					}
					break;
				}
			}
		}
		else {
			if($action == 'deconnexion')
			{
				session_destroy();
				echo "<script>location.href=\"index.php?uc=accueil\"</script>";
			}
			else
			include("vues/v_login.php");
		}

?>
