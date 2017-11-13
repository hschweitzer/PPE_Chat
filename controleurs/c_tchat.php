<?php
if(isset($_SESSION['id_user']))
{
    $profil = $Pdo->getUtilisateurParId($_SESSION['id_user']);
    connexionChat($profil['email'],$Pdo);
}

if(isset($_SESSION['admin']))
{
    $admin = $Pdo->getInfosAdmin($_SESSION['admin']);
    connexionChat($admin['nom'],$Pdo);
}

if(isset($_REQUEST['btn_logout']))
{
    unset($_SESSION['chat_user']);
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
            if(!isset($_SESSION['admin']))
            {
                $email = $_SESSION['chat_user'];
                $admin = "toto";
                $date = new DateTime();
                $date = date_format($date, 'Y-m-d H:i:s');
                $Pdo->updateActivity($date,$email);
                $fromAdmin = 0;
            }
            else
            {
                $fromAdmin = 1;
                $admin = $_SESSION['admin'];
                $email = $_SESSION['toUser'];
                $date = new DateTime();
                $date = date_format($date, 'Y-m-d H:i:s');
            }
            $message = $_POST['message'];
            $message = htmlspecialchars($message);
            $message = nl2br($message);
            $Pdo->insertMessage($email,$admin,$message,$fromAdmin);
            unset($_POST);
            break;
        
        case 'select':
                $_SESSION['toUser'] = $_POST['select_user'];
            break;
    }
    
}
?>