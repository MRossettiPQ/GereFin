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


            echo "
            <center>
                <table border='dadosJogo' bgcolor=#afbdd4>
                    <tr>
                        <td style='width:500px;height:300px;'>
                            <img src='graf_1.jpg' alt='Capa' style='width:500px;height:300px;'>
                        </td>
                        <td style='width:500px;height:300px;'>
                            <img src='graf_2.jpg' alt='Capa' style='width:500px;height:300px;'>
                        </td>
                    </tr>
                    <tr>
                        <td style='width:500px;height:150px;'>
                            <table border='dadosJogo' bgcolor=#afbdd4>
                                <tr>
                                    <td style='width:498px;height:35px;'>
                                        <center><b>Ultimos Contratos</b></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='width:498px;height:135px;'>";
                                    $query = "SELECT id_Contrato, titulo_Contrato, orca_Contrato, cidade_Contrato FROM contrato ORDER BY dataInicio_Contrato DESC";
                                    $result = mysqli_query($link, $query); //CONTRATOS
                                    $qtd = 0;
                                    while ((list($id_Contrato, $titulo_Contrato, $orca_Contrato, $cidade_Contrato ) = mysqli_fetch_row($result)) && ($qtd <= 3))
                                    {
                                        echo "
                                        <table border='tabuleiroFilmesExsitentes' bgcolor=#afbdd4>
                                            <tr>
                                                <td style='width:298px;height:36px;'>
                                                    <center>$titulo_Contrato</center>
                                                </td>
                                                <td style='width:100px;height:36px;'>
                                                    <center>$cidade_Contrato</center>
                                                </td>
                                                <form name='editar' action='mostraDetalhes.php?idContrato=".$id_Contrato."' method='post' >      
                                                    <td style='width:100px;height:33px;'>
                                                        <input type='submit' style = 'width:100px; height:33px;' value='Detalhes'>
                                                    </td>
                                                </form>
                                            </tr>
                                        </table>";
                                        $qtd = $qtd + 1;
                                    }
                                    echo "
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style='width:500px;height:150px;'>
                            <table border='dadosJogo' bgcolor=#afbdd4>
                                <tr>
                                    <td style='width:498px;height:35px;'>
                                        <center><b>Contratos Finalizados</b></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='width:498px;height:135px;'>";
                                    $query1 = "SELECT id_Contrato, titulo_Contrato, orca_Contrato, cidade_Contrato, status_Contrato FROM contrato ORDER BY dataFim_Contrato DESC";
                                    $result1 = mysqli_query($link, $query1); //CONTRATOS
                                    $qtd = 0;
                                    while ((list($id_Contrato, $titulo_Contrato, $orca_Contrato, $cidade_Contrato, $status_Contrato ) = mysqli_fetch_row($result1)) && ($qtd <= 3))
                                    {
                                        if($status_Contrato == "1")
                                        {
                                            echo "
                                            <table border='tabuleiroFilmesExsitentes' bgcolor=#afbdd4>
                                                <tr>
                                                    <td style='width:298px;height:36px;'>
                                                        <center>$titulo_Contrato</center>
                                                    </td>
                                                    <td style='width:100px;height:36px;'>
                                                        <center>$cidade_Contrato</center>
                                                    </td>
                                                    <form name='editar' action='mostraDetalhes.php?idContrato=".$id_Contrato."' method='post' >      
                                                        <td style='width:100px;height:33px;'>
                                                            <input type='submit' style = 'width:100px; height:33px;' value='Detalhes'>
                                                        </td>
                                                    </form>
                                                </tr>
                                            </table>";
                                        }
                                        $qtd = $qtd + 1;
                                    }
                                    echo"
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </center>
            ";
        ?>
    </body>
</html>
