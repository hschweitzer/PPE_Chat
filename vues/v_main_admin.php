<style>
.admin-container {
  width: 100%;
  background: #fff;
  padding-bottom: 2rem;
}
.list-container-admin-nvalides, .list-container-admin-tous {
  width: 100%;
  display: flex;
  flex-direction: column;
}
.list-element-admin-nvalides, .list-element-admin-tous {
  width: 100%;
  display: flex;
  flex-wrap: nowrap;
  margin: 4px;
}
.list-element-admin-nvalides div.sub, .list-element-admin-tous div.sub {
  display: flex;
  justify-content: center;
  background: #efe;
  flex-grow: 2;
}
.list-element-admin-nvalides img, .list-element-admin-tous img {
  height: 80px;
}
.list-element-admin-nvalides a, .list-element-admin-tous a {
  display: flex;
  height: 3rem;
  padding: 0 1rem;
  justify-content: center;
  align-items: center;
  height: 80px;
  color: black;
  text-decoration: none;
}
.list-element-admin-nvalides a.important, .list-element-admin-tous a.important {
  text-decoration: underline;
}
.list-element-admin-nvalides div.button-container, .list-element-admin-tous div.button-container {
  min-width: 125px;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  align-items: center;
  background: #efe;
}
a.button, input.button {
  width: 120px;
  height: 25px !important;
  padding: 0;
  border: inset 2px #444;
  background: #eee;
  cursor: pointer;
  color: black;
  text-decoration: none;
  font-size: 15px;
  font-family: "Open Sans", sans-serif;
}
a.button:hover, input.button:hover {
  background: #dfdfdf;
}
h3 {
  margin: 1rem 0 .6rem 1rem;
}
.admin-verif {
  display: flex;
  margin: auto;
  flex-direction: column;
  align-items: center;
}
a.medium-margin {
  margin: .2rem;
}
a.red {
  background: #c66;
}
a.red:hover {
  background: #b55;
}
</style>
<div class="admin-container">
  <h3>Utilisateurs en attente de validation</h3>
  <div class="list-container-admin-nvalides">
  <?php foreach ($tousLesProfilsAValider as $key => $profil): ?>
    <div class="list-element-admin-nvalides">
      <!--<img src="<?php //echo $profil["photo"]; ?>" onerror="this.src='images/default-profile.png'">-->
      <div class="sub">
        <a>
          <?php echo $profil["first_name"] . " " . $profil["last_name"]; ?>
        </a>
        <a class="important">
          <?php echo $profil["email"]; ?>
        </a>
      </div>
      <div class="button-container">
        <form action="index.php?uc=admin&action=valider" method="post">
          <input type="hidden" name="id" value="<?php echo $profil["id"]; ?>" />
          <input type="hidden" name="email" value="<?php echo $profil["email"]; ?>" />
          <input type="hidden" name="nom" value="<?php echo $profil["first_name"] . " " . $profil["last_name"]; ?>" />
          <input type="submit" class="button" value="Valider" name="valider"/>
        </form>
        <a class="button" href="index.php?uc=admin&action=supprimer&id=<?php echo $profil["id"]; ?>">
          Supprimer
        </a>
      </div>
    </div>
  <?php endforeach; ?>
  </div>

  <h3>Tous les chiens d'utilisateurs validés</h3>
  <div class="list-container-admin-tous">
  <?php foreach ($tousLesProfilsValides as $key => $profil): ?>
    <div class="list-element-admin-tous">
      <img src="<?php echo  $profil["photo"]; ?>" onerror="this.src='images/default-profile.png'">
      <div class="sub">
        <a>
          <?php echo $profil["first_name"] . " " . $profil["last_name"]; ?>
        </a>
        <a class="important">
          <?php echo $profil["email"]; ?>
        </a>
        <a>
          <?php echo $profil["name"]; ?>
        </a>
        <a>
          <?php $date = strtotime( $profil["end_date"] ); $date = date( 'd/m/Y', $date );echo "Fin : ".$date; ?>
        </a>
      </div>
      <div class="button-container">
        <!--<a class="button" href="">
          Consulter
        </a>-->
        <a class="button" href="index.php?uc=admin&action=renouveler&iduser=<?php echo $profil["id"]; ?>&idchien=<?php echo $profil["tattoo_id"]; ?>">
          Renouveler
        </a>
        <a class="button" href="index.php?uc=admin&action=supprimer&id=<?php echo $profil["id"]; ?>">
          Supprimer
        </a>
      </div>
    </div>
  <?php endforeach; ?>
  </div>

</div>

<?php //TODO: pagination / infinite scrolling ?>
