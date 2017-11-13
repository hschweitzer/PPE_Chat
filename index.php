<?php
session_start();
require("util/classpdo.php");
$Pdo = PdoAssoc::getPdoAssoc();
require("util/send_mail.php");
require("util/fonctions.php");
include("controleurs/c_tchat.php");
include("vues/v_entete.php");
include("vues/v_bandeau.php");
$lesRaces = $Pdo->getToutesLesRaces();
$lesUsers = $Pdo->getLesUsers();
include("vues/v_inscription.php");
include("vues/v_login.php");
include("vues/v_tchat.php");

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
