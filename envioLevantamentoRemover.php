<?php
    //Chamado do conexão da pagina
    include 'setupSESSION.php';
    include 'setupConectaBanco.php';

    $id_Levantamento = $_GET["id_Levantamento"];

    $query = "DELETE FROM levantamento WHERE id_Levantamento = $id_Levantamento";
    
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