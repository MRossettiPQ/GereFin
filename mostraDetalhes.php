<html>
    <body bgcolor=#d8dfea>
        <?php
            //Chamado do cabeçalho Login da pagina 
            include 'setupCabecalhoLogin.php';
            include 'setupSESSION.php';
            echo "</br></br>";
            //Chamado do cabeçalho da pagina
            include 'setupCabecalho.php';

            //Chamado do setup pagina
            include 'setupPagina.php';

            //Chamado do conexão da pagina
            include 'setupConectaBanco.php';

            $pId = $_GET['idContrato'];

            //QUERY VERIFICAR A LIBERAÇÃO DO JOGO NO SISTEMA

            //QUERY INFORMAÇÕES CONTRATO
            $query_1 = "SELECT cod_Contrato, titulo_Contrato, cidade_Contrato, orca_Contrato, FK_id_Usuario, dataInicio_Contrato, dataFim_Contrato, status_Contrato, desc_Contrato FROM contrato WHERE id_Contrato = $pId";
            $result_1 = mysqli_query($link, $query_1); //CONTRATOS

            //percorrimento das linhas retornadas pela query
            while (list($cod_Contrato, $titulo_Contrato, $cidade_Contrato, $orca_Contrato, $FK_id_Usuario, $dataInicio_Contrato, $dataFim_Contrato, $status_Contrato, $desc_Contrato) = mysqli_fetch_row($result_1))
            {
                //QUERY INFORMAÇÕES LEVANTAMENTO
                $query_7 = "SELECT id_Levantamento, FK_id_Custo, mult_Levantamento, comentario_Levantamento, data_Levantamento, FK_id_Usuario FROM levantamento WHERE FK_id_Contrato='$pId'";
                $result_7 = mysqli_query($link, $query_7); //Levantamentos

                $query_6 = "SELECT nome_Usuario FROM usuario WHERE id_Usuario='$FK_id_Usuario'";
                $result_6 = mysqli_query($link, $query_6); //Usuario
                
                echo "
                <center>
                <table border='comentarios' bgcolor=#afbdd4>
                    <tr>  
                        <td valign='center' style='width:1185px'>
                            <table border='cartaoJogo' bgcolor=#afbdd4>
                                <tr>
                                    <td style='width:1185px;height:50px;'>
                                    <center><b>".$titulo_Contrato."</b></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign='top' style='width:723px;'>
                                    <table border='dadosJogo' bgcolor=#afbdd4>
                                    <tr>
                                        <td>
                                            <table border='dadosBasico' bgcolor=#afbdd4>
                                                <tr>
                                                    <td valign='center' style='width:600px;height:35px;'>
                                                        <center><b>Descrição</center></b>
                                                    </td>
                                                    <tr>
                                                        <td valign='top' style='width:600px;height:160px;'>
                                                            <center>".$desc_Contrato."</center>
                                                        </td>
                                                    </tr>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <table border='dadosBasico' bgcolor=#afbdd4>
                                                <tr>
                                                    <td valign='center' style='width:177.5px;height:65px;'>
                                                        <center><b>Codigo Contrato</center></b>
                                                    </td>
                                                    <td valign='center' style='width:177.5px;height:65px;'>
                                                            <center>".$cod_Contrato."</center>
                                                        </td>
                                                    <td valign='center' style='width:177.5px;height:65px;'>
                                                        <center><b>Localização</center></b>
                                                    </td>
                                                    <td valign='center' style='width:177.5px;height:65px;'>                    
                                                        <center>".$cidade_Contrato."</center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign='center' style='width:177.5px;height:65px;'>
                                                        <center><b>Resposanvel</center></b>
                                                    </td>
                                                    <td valign='center' style='width:177.5px;height:65px;'>";
                                                        while (list($nome_Usuario) = mysqli_fetch_row($result_6))
                                                        {
                                                            echo"
                                                                <center>".$nome_Usuario."</center>";
                                                        }
                                                    echo "
                                                    </td>
                                                    <td valign='center' style='width:177.5px;height:65px;'>
                                                        <center><b>Status</center></b>
                                                    </td>
                                                    <td valign='center' style='width:177.5px;height:65px;'>
                                                        ";
                                                        if($status_Contrato == 0)
                                                        {
                                                            echo "<center>Em Andamento</center>";
                                                        }
                                                        else
                                                        {
                                                            echo "<center>Finalizado</center>";
                                                        }    
                                                        echo "
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign='center' style='width:177.5px;height:65px;'>
                                                        <center><b>Data Inicio</center></b>
                                                    </td>
                                                    <td valign='center' style='width:177.5px;height:65px;'>
                                                        <center>".$dataInicio_Contrato."</center>
                                                    </td>
                                                    <td valign='center' style='width:177.5px;height:65px;'>
                                                        <center><b>Data Final</center></b>
                                                    </td>
                                                    <td valign='center' style='width:177.5px;height:65px;'>
                                                        <center>".$dataFim_Contrato."</center>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <table border='lateralDireita' bgcolor=#afbdd4>
                                                <tr>
                                                    <td style='width:120px;height:30px;'>
                                                        <center>
                                                        <b>Orçamento</b>
                                                        </center>
                                                    </td>
                                                </tr>                            
                                                <tr>
                                                    <td style='width:120px;height:29px;'>
                                                        <input type='submit' style = 'width:118px; height:29px;' value='".$orca_Contrato."'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style='width:120px;height:29px;'>
                                                        <center>
                                                        <b>Custo</b>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr>";
                                                    $query_10 = "SELECT FK_id_Custo, mult_Levantamento FROM levantamento WHERE FK_id_Contrato = $pId";
                                                    $result_10 = mysqli_query($link, $query_10); //CONTRATOS
                                                    $custo_Contrato = 0;
                                                    $saldo_Contrato = $orca_Contrato;
                                                    if(mysqli_fetch_row($result_10) != NULL)
                                                    {
                                                        //percorrimento das linhas retornadas pela query
                                                        while (list($FK_id_Custo, $mult_Levantamento) = mysqli_fetch_row($result_10))
                                                        {
                                                            $query_12 = "SELECT valor_Custo FROM custo WHERE id_Custo = $FK_id_Custo";
                                                            $result_12 = mysqli_query($link, $query_12); //CONTRATOS

                                                            //percorrimento das linhas retornadas pela query
                                                            while (list($valor_Custo) = mysqli_fetch_row($result_12))
                                                            {
                                                                $custo_Contrato = $custo_Contrato + ($mult_Levantamento * $valor_Custo);
                                                                $saldo_Contrato = $orca_Contrato - $custo_Contrato;
                                                                echo "
                                                                    <td style='width:120px;height:29px;'>
                                                                        <input type='submit' style = 'width:118px; height:29px;' value='".$custo_Contrato."'>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style='width:120px;height:29px;'>
                                                                        <center>
                                                                        <b>Saldo</b>
                                                                        </center>
                                                                    </td>
                                                                </tr>                            
                                                                <tr>
                                                                    <td style='width:120px;height:29px;'>
                                                                        <input type='submit' style = 'width:118px; height:29px;' value='".$saldo_Contrato."'>
                                                                    </td>
                                                                ";
                                                            }
                                                        }
                                                        if(($custo_Contrato == 0) && ($saldo_Contrato == $orca_Contrato))
                                                        {
                                                            echo "
                                                            <td style='width:120px;height:29px;'>
                                                                <input type='submit' style = 'width:118px; height:29px;' value='0'>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style='width:120px;height:29px;'>
                                                                <center>
                                                                <b>Saldo</b>
                                                                </center>
                                                            </td>
                                                        </tr>                            
                                                        <tr>
                                                            <td style='width:120px;height:29px;'>
                                                                <input type='submit' style = 'width:118px; height:29px;' value='".$saldo_Contrato."'>
                                                            </td>
                                                        ";
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "
                                                            <td style='width:120px;height:29px;'>
                                                                <input type='submit' style = 'width:118px; height:29px;' value='0'>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style='width:120px;height:29px;'>
                                                                <center>
                                                                <b>Saldo</b>
                                                                </center>
                                                            </td>
                                                        </tr>                            
                                                        <tr>
                                                            <td style='width:120px;height:29px;'>
                                                                <input type='submit' style = 'width:118px; height:29px;' value='0'>
                                                            </td>
                                                        ";
                                                    }
                                                    echo"
                                                </tr>  
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                    </td>
                                </tr>
                            </table>       
                        </td>
                    </tr>
                    <tr>
                        <td style='width:1185px;height:42px;'>
                            <center><b>ADICIONAR</b><center> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                           <table border='comentarioNovo' bgcolor=#afbdd4>
                                <form name='comentar' action='envioLevantamentoCriar.php?id_Contrato=".$pId."' method='post'>
                                        <td>
                                            <select name='custoLevantamento' style ='width:230px; height:50px;'>
                                                <option value='' selected disabled hidden>Escolha</option>";
                                                $query_9 = "SELECT titulo_Custo, id_Custo FROM custo";
                                                $result_9 = mysqli_query($link, $query_9); //Usuario
                                                while (list($titulo_Custo, $id_Custo) = mysqli_fetch_row($result_9))
                                                {
                                                    echo"<option value='$id_Custo'>$titulo_Custo</option>";
                                                }
                                                echo "
                                            </select> 
                                        </td>
                                        <td style='width:60px;height:50px;'>
                                            <input name='quantoLevantamento' value= 'Quanto?' type='number' align='center' style='width:60px;height:50px;' margin='0' >
                                        </td>
                                        <td style='width:500px;height:50px;'>
                                            <input name='comentarioLevantamento' value= 'Motivação desse gasto?'type='Text' align='center' style='width:500px;height:50px;' margin='0' >
                                        </td>
                                        <td style='width:260px;height:50px;'>
                                            <input name='dataLevantamento' value='0' type='date' align='center' style='width:260px;height:50px;'>
                                        </td>
                                        <td style='width:100px;height:50px;'>
                                            <input type='submit' value ='Comentar'align = 'center' margin='0' style='width:100px;height:50px;'>
                                        </td>
                                </form>
                            </table>
                    </tr>";
                    if(empty($result_4) === TRUE)
                    {   
                        echo "<tr>
                                <td style='width:1185px;height:42px;'>
                                    <center><b>GASTOS</b><center> 
                                </td>
                            </tr>
                        <tr>
                            <td valign='top' style='width:1185px;'>";

                        while (list($id_Levantamento, $FK_id_Custo, $mult_Levantamento, $comentario_Levantamento, $data_Levantamento, $FK_id_Usuario) = mysqli_fetch_row($result_7))
                        {
                            //QUERY INFORMAÇÕES ESTUDIO
                            $query_8 = "SELECT nome_Usuario  FROM usuario WHERE id_Usuario = '$FK_id_Usuario'";
                            $result_8 = mysqli_query($link, $query_8);

                            while (list($nome_Usuario) = mysqli_fetch_row($result_8))
                            {
                                echo "<table border='comentarios' bgcolor=#afbdd4>
                                    <tr>
                                        <td style='width:90px;height:62px;'>
                                            <center>
                                            ".$id_Levantamento."
                                            </center>
                                        </td>
                                        <td style='width:250px;height:62px;'>";

                                        $query_5 = "SELECT titulo_Custo, tip_Custo, valor_Custo FROM custo WHERE id_Custo = '$FK_id_Custo'";
                                        $result_5 = mysqli_query($link, $query_5);  //TIPOS DE CUSTO
                
                                        while (list($titulo_Custo, $tip_Custo, $valor_Custo ) = mysqli_fetch_row($result_5))
                                        {
                                            echo "<center>
                                                ".$titulo_Custo."
                                                </center>
                                            </td>
                                            <td style='width:200px;height:62px;'>
                                                <center>
                                                ".$data_Levantamento."
                                                </center>
                                            </td>
                                            <td style='width:100px;height:62px;'>
                                                <center>
                                                ".$mult_Levantamento;
                                            if($tip_Custo == 0)
                                                {
                                                    echo " Horas";
                                                }
                                            else
                                                {
                                                    echo " Und.";
                                                }
                                            $valor_Total = $valor_Custo * $mult_Levantamento;
                                            echo "
                                                </center>
                                            </td>
                                            <td style='width:200px;height:62px;'>
                                                <center>
                                                ".$valor_Total."
                                                </center>
                                            </td>";
                                        }
                                        echo "
                                        <td style='width:300px;height:62px;'>
                                            <center>
                                            ".$comentario_Levantamento."
                                            </center>
                                        </td>                                       
                                        <td style='width:180px;height:62px;'>
                                            <center>
                                            ".$nome_Usuario."
                                            </center>
                                        </td>";
                                        if($_SESSION['idProfiles'] == 0)
                                        {
                                            echo "<form name='editar' action='envioLevantamentoRemover.php?id_Levantamento=".$id_Levantamento."' method='post' >
                                                <td style='width:78px;height:62px;'>   
                                                            <input type='submit' style = 'width:78px; height:62px;' value='Remover'>
    
                                                </td>";
                                        }
                                        else
                                        {
                                        echo "
                                        <td style='width:80px;height:62px;'>   

                                        </td>";
                                        }
                                        echo "
                                        </form>
                                    </tr>
                                </table>";
                            }
                        }
                    }
                    echo "</td>
                </tr>
            </table>";
            }
            echo "<br>";
        ?>
    </body>
</html>