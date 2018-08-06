<?php
    //Chamado do conexão da pagina
    include 'setupSESSION.php';
    include 'setupConectaBanco.php';

    if( empty($_POST['descContrato']) || empty($_POST['orcaContrato']) ||empty($_POST['nomeContrato']) || empty($_POST['codigoContrato']) || empty($_POST['dataContrato']) || empty($_POST['localContrato']))
    {        
        echo "<script>
        alert('Todos os campos são obrigatorios.');
            window.history.back();
        </script>";
    }
    else
    {
        $idUsuario = $_SESSION['idUser'];
        $nomeContrato = $_POST['nomeContrato'];
        $codigoContrato = $_POST['codigoContrato'];
        $dataContrato = $_POST['dataContrato'];
        $localContrato = $_POST['localContrato'];
        $descContrato = $_POST['descContrato'];
        $orcaContrato = $_POST['orcaContrato'];

        $query = "INSERT INTO contrato 
        (cod_Contrato,	titulo_Contrato,	cidade_Contrato,	orca_Contrato,	FK_id_Usuario,	dataInicio_Contrato,	status_Contrato,	desc_Contrato)
        VALUES 
        ('$codigoContrato','$nomeContrato','$localContrato','$orcaContrato', '$idUsuario','$dataContrato', '0', '$descContrato')";

        if($link->query($query) === TRUE)
        {
        }
        else
        {
            echo "<br>"."Erro: ".$query."<br>".$link->error;
        }
        $link->close();
        echo "<script>
            window.location.href = 'mostraPrincipal.php';
        </script>";
    }
?>