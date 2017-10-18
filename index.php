<?php
session_start();

//TODO Renvoyer une erreur si connexion DB impossible plutôt que de charger du vent 15 ans
require("util/classpdo.php");
$Pdo = PdoAssoc::getPdoAssoc();
require("util/send_mail.php");
require("util/fonctions.php");
include("vues/v_entete.php");
include("vues/v_bandeau.php");
$lesRaces = $Pdo->getToutesLesRaces();
include("vues/v_inscription.php");
include("vues/v_login.php");

if (!isset($_GET["uc"]))
    $uc = 'accueil';
else
    $uc = $_GET["uc"];

switch($uc) {
    case 'accueil':
      include("vues/v_accueil.php");
      $lesRaces = $Pdo->getToutesLesRaces();
        break;
    case 'login':
        include("controleurs/c_login.php");
        break;
    case 'utilisateur':
        include("controleurs/c_utilisateur.php");
        break;
    case 'admin':
        include("controleurs/c_admin.php");
        break;
    default:
      include("vues/v_accueil.php");
      include("vues/v_inscription.php");
      include("vues/v_login.php");
      break;
}
include("vues/v_pied.php");
?>