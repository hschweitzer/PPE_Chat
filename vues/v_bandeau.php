<?php
  
?>
<div class="navbar-container">
    <div class="navbar">
      <div class="sub-navbar">
        <div class="nav-button"><a href="index.php?uc=accueil">Accueil</a></div>
<?php if (!isset($_SESSION["id_user"]) && !isset($_SESSION["admin"])) { ?>
        <div class="nav-button"><span id="btn_conn" onclick="showConnexion()">Connexion</span></div>
        <div class="nav-button"><span id="btn_insc" onclick="showInscription()">Inscription</span></div>
<?php } elseif (!isset($_SESSION["admin"])) { ?>
        <div class="nav-button"><a href="index.php?uc=utilisateur&action=profil">Mon profil</a></div>
        <div class="nav-button"><a href="index.php?uc=login&action=deconnexion">Déconnexion</a></div>
<?php }    else { ?>
            <div class="nav-button"><a href="index.php?uc=admin">Panel admin</a></div>
            <div class="nav-button"><a href="index.php?uc=login&action=deconnexion">Déconnexion</a></div>
<?php } ?>
      </div>
    </div>
</div>
