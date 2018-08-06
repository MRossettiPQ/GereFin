<?php
    //Chamado do conexão da pagina
    include 'setupSESSION.php';
    include 'setupConectaBanco.php';

    $idContrato = $_GET["idContrato"];

    $data = date("Y-m-d");

    $query = "UPDATE contrato SET dataFim_Contrato='$data', status_Contrato='1' WHERE id_Contrato=$idContrato";

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