<?php
session_start();
if(isset($_SESSION['chat_user']) && !empty($_GET['id']))
{
    require("./classpdo.php");
    $Pdo = new PdoAssoc();
    $id = (int) $_GET['id'];
    if(!isset($_SESSION['admin']))
    {
        $res = $Pdo->getLesMessages($_SESSION['chat_user'],$id);

        $messages = null;
        foreach($res as $i => $row)
        {
            if($row['from_admin'] == 1)
            {
                $sender = "[Administrateur] ".$row['admin']." : ";
                $color = "lightblue";
            }
            else
            {
                $sender = "Vous : ";
                $color = "lightgrey";
            }
            $messages .= "<p id=\"".$row['id']."\" style=\"padding: 2px; border-radius: 3px; background-color: $color;\">".$sender.$row['message']."</p>";
        }
        echo $messages;
    }
    else if(isset($_SESSION['toUser']))
    {
        $res = $Pdo->getLesMessages($_SESSION['toUser'],$id);

        $messages = null;
        foreach($res as $i => $row)
        {
            if($row['from_admin'] == 1)
            {
                $sender = "Vous : ";
                $color = "lightgrey";
            }
            else
            {
                $sender = $_SESSION['toUser'] . " : ";
                $color = "lightblue";
            }
            $messages .= "<p id=\"".$row['id']."\" style=\"padding: 2px; border-radius: 3px; background-color: $color;\">".$sender.$row['message']."</p>";
        }
        echo $messages;
    }
    
    
}
?>
