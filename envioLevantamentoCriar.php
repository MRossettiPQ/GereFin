<?php
    //Chamado do conexão da pagina
    include 'setupSESSION.php';
    include 'setupConectaBanco.php';

    if((empty($_POST["custoLevantamento"])) || (empty($_POST["quantoLevantamento"])) || (empty($_POST["comentarioLevantamento"])) || (empty($_POST["dataLevantamento"])))
    {        
        echo "<script>
            alert('Os campos dos custos são obrigatorios.');
            window.history.back();
        </script>";
    }
    else
    {
        $idUser = $_SESSION['idUser'];
        $id_Contrato = $_GET["id_Contrato"];
        $custoLevantamento = $_POST["custoLevantamento"];
        $quantoLevantamento = $_POST["quantoLevantamento"];
        $comentarioLevantamento = $_POST["comentarioLevantamento"];
        $dataLevantamento = $_POST["dataLevantamento"];
        
        $query = "INSERT INTO levantamento (FK_id_Custo, mult_Levantamento, FK_id_Contrato, comentario_Levantamento, data_Levantamento, FK_id_Usuario) VALUES ('$custoLevantamento', '$quantoLevantamento', '$id_Contrato', '$comentarioLevantamento','$dataLevantamento','$idUser')";
        if($link ->query($query) === TRUE)
        {
        }
        else
        {
            echo "<br>"."Erro: ".$query."<br>".$link->error;
        }

        $link->close();        
        echo "<script>
            window.location.href = 'mostraComum.php';
        </script>";
    }
?>