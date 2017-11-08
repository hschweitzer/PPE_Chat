<?php
if(isset($_SESSION['id_user']))
{
    $profil = $Pdo->getUtilisateurParId($_SESSION['id_user']);
    connexionChat($profil['email'],$Pdo);
}

if(isset($_SESSION['admin']))
{
    connexionChat($_SESSION['admin'],$Pdo);
}

if(isset($_REQUEST['btn_logout']))
{
    session_destroy($_SESSION['chat_user']);
    var_dump($_SESSION);
    header("Location:index.php?uc=accueil");
    //echo "<meta http-equiv='refresh' content='0'>";
}

if (isset($_REQUEST['chat']))
{
    $action = $_REQUEST['chat'];
    switch($action)
    {
        case 'login':
            connexionChat($_POST['email'],$Pdo);
            break;

        case 'envoi':
            var_dump($_SESSION);
            $message = $_POST['message'];
            
            break;
    }
}
?>