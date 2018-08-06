<?php                
    if(!isset($_SESSION))
    {
        // session_start inicia a sessão
        session_start();

        if(!isset($_SESSION['idProfiles']))
        {
            $_SESSION['idProfiles'] = '4';  
            $_SESSION['idUser'] = '0';  
        }
    }
?>