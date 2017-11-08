<?php
if(isset($_SESSION['id_user']))
{
    //if()
    $profil = $Pdo->getUtilisateurParId($_SESSION['id_user']);
    $_SESSION['chat_user'] = $profil["email"];
}

if (isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
}
?>