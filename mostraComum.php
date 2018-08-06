<html>
<body bgcolor=#d8dfea>
    <?php
        //Chamado do cabeçalho Login da pagina 
        include 'setupCabecalhoLogin.php';
        echo "</br></br>";
        //Chamado do cabeçalho da pagina
        include 'setupCabecalho.php';

        //Chamado do setup pagina
        include 'setupPagina.php';

        //Chamado do conexão da pagina
        include 'setupConectaBanco.php';

        $query = "SELECT 	id_Contrato,	cod_Contrato,	titulo_Contrato,	cidade_Contrato,	orca_Contrato,	FK_id_Usuario,	dataInicio_Contrato,	dataFim_Contrato, status_Contrato FROM contrato";
        $result = mysqli_query($link, $query);
        if(empty($result) === FALSE)
        {
            echo "<center>
            <table border='tabuleiroUsuarios' align='center' bgcolor=#afbdd4>
                <tr>
                    <td style='width:30px;height:34px;'>
                        <center>
                                ID
                        </center>
                    </td>
                    <td style='width:200px;height:34px;'>
                        <center>
                                Codigo Contrato
                        </center>
                    </td>
                    <td style='width:250px;height:34px;'>
                        <center>
                                Cidade
                        </center>
                    </td>
                    <td style='width:300px;height:34px;'>
                        <center>
                                Titulo
                        </center>
                    </td> 
                    <td style='width:150px;height:34px;'>
                        <center>
                                Orçamento
                        </center>
                    </td> 
                    <td style='width:150px;height:34px;'>
                        <center>
                                Custo
                        </center>
                    </td>
                    <td style='width:150px;height:34px;'>
                        <center>
                                Saldo
                        </center>
                    </td> 
                    <td style='width:150px;height:34px;'>
                        <center>
                                Responsavel
                        </center>
                    </td> 
                    <td style='width:100px;height:34px;'>
                        <center>
                                Data de Inicio
                        </center>
                    </td> 
                    <td style='width:100px;height:34px;'>
                        <center>
                                Data de Fim
                        </center>
                    </td> 
                    <td style='width:69px;height:34px;'>
                        <center>
                                Alterar
                        </center>
                    </td> 
                </tr>";
            while (list($id_Contrato,	$cod_Contrato,	$titulo_Contrato,	$cidade_Contrato,	$orca_Contrato,	$FK_id_Usuario,	$dataInicio_Contrato,	$dataFim_Contrato, $status_Contrato) = mysqli_fetch_row($result))
            {
                echo 
                    "
                    <tr>
                        <td style='width:30px;height:34px;'>
                            <center>
                            ".
                                    $id_Contrato
                            ."
                            </center>
                        </td> 
                        <td style='width:200px;height:34px;'>
                            <center>
                            ".
                                    $cod_Contrato
                            ."
                            </center>
                        </td>
                        <td style='width:250px;height:34px;'>
                            <center>
                            ".
                                    $cidade_Contrato
                            ."
                            </center>
                        </td>
                        <td style='width:300px;height:34px;'>
                            <center>
                            ".
                                    $titulo_Contrato
                            ."
                            </center>
                        </td> 
                        <td style='width:150px;height:34px;'>
                            <center>
                            ".
                                    $orca_Contrato
                            ."
                            </center>
                        </td>";
                        $query_2 = "SELECT 	mult_Levantamento FROM levantamento WHERE FK_id_Contrato = $id_Contrato";
                        $result_2 = mysqli_query($link, $query_2);
                        $custo_Contrato = 0;
                        $saldo_Contrato = $orca_Contrato;
                    
                        while (list($mult_Levantamento) = mysqli_fetch_row($result_2))
                        {   
                                $query_3 = "SELECT 	valor_Custo FROM custo";
                                $result_3 = mysqli_query($link, $query_3);
                                while (list($valor_Custo) = mysqli_fetch_row($result_3))
                                {
                                    $custo_Contrato = $custo_Contrato + ($mult_Levantamento * $valor_Custo);
                                    $saldo_Contrato = $saldo_Contrato - $custo_Contrato;
                                    echo "
                                    <td style='width:150px;height:34px;'>
                                        <center>
                                        ".
                                                $custo_Contrato
                                        ."
                                        </center>
                                    </td> 
                                    <td style='width:150px;height:34px;'>
                                        <center>
                                        ".
                                                $saldo_Contrato
                                        ."
                                        </center>
                                    </td>
                                    ";
                                }
                        }
                        if(($custo_Contrato == 0) && ($saldo_Contrato == $orca_Contrato))
                        {
                            echo "
                            <td style='width:150px;height:34px;'>
                                <center>0</center>
                            </td> 
                            <td style='width:150px;height:34px;'>
                                <center>$orca_Contrato</center>
                            </td>
                            ";
                        }
                        $query_3 = "SELECT 	usuario_Usuario FROM usuario WHERE id_Usuario = $FK_id_Usuario";
                        $result_3 = mysqli_query($link, $query_3);
                    
                        while (list($usuario_Usuario) = mysqli_fetch_row($result_3))
                        {
                            echo "
                            <td style='width:150px;height:34px;'>
                                <center>
                                        ".$usuario_Usuario."
                                </center>
                            </td>";   

                        }

                        echo "
                        <td style='width:100px;height:34px;'>
                            <center>
                                    ".$dataInicio_Contrato."
                            </center>
                        </td>
                        <td style='width:100px;height:34px;'>
                            <center>
                                    ".$dataFim_Contrato."
                            </center>
                        </td>
                        <td>
                            <table border='comentarios' bgcolor=#afbdd4>
                                <tr>
                                    <form name='editar' action='mostraDetalhes.php?idContrato=".$id_Contrato."' method='post' >
                                        <td style='width:78px;height:62px;'>   
                                            <input type='submit' value='Detalhes' style = 'width:78px; height:62px;' value='Remover'>
                                        </td>
                                    </form>
                                </tr>";
                                if($status_Contrato == 0)
                                {
                                    echo "                               
                                    <tr>
                                        <form name='editar' action='envioContratoFinaliza.php?idContrato=".$id_Contrato."' method='post' >
                                            <td style='width:78px;height:62px;'>   
                                                <input type='submit' value='Finalizar' style = 'width:78px; height:62px;' value='Remover'>
                                            </td>
                                        </form>
                                    </tr>";
                                }
                                else
                                {
                                    echo "                                
                                    <tr>
                                        <td style='width:78px;height:62px;'>   
                                                <center>Finalizado</center>
                                        </td>
                                    </tr>";
                                }
                                echo "
                            </table>
                        </td>
                    </tr>
                ";
            }
            echo "                </table>
            </center>";
        }
    ?>
    </body>
</html>