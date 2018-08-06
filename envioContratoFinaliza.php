<?php
    //Chamado do conexão da pagina
    include 'setupSESSION.php';
    include 'setupConectaBanco.php';

    $idUsuario = $_GET["idUsuario"];
    

    $query = "UPDATE usuario SET status_Usuario ='1' WHERE id_Usuario=$idUsuario";

    if($link ->query($query) === TRUE)
    {
        
    }
    else
    {
        echo "<br>"."Erro: ".$query."<br>".$link->error;
    }
    $link->close();            
    echo "<script>
        window.history.back();
    </script>";
?>