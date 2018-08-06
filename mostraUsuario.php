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
    ?>        
    <center>
        <table border="tabuleiroCabecalhoUsuarios" align='center' bgcolor=#afbdd4>
        <tr>
            <td style='width:67px;height:34px;'>
                <center style="width:67px;">
                        ID
                </center>
            </td>
            <td style='width:167px;height:34px;'>
                <center>
                        Nome Usuario
                </center>
            </td>
            <td style='width:167px;height:34px;'>
                <center>
                        Usuario
                </center>
            </td> 
            <td style='width:330px;height:34px;'>
                <center>
                        E-Mail
                </center>
            </td> 
            <td style='width:90px;height:34px;'>
                <center>
                        Data Nascimento
                </center>
            </td>
            <td style='width:69px;height:62px;'>
                <center>
                        Remover
                </center>
            </td>  
        </tr>
    </table>
    </center>
    <?php
        $query = "SELECT id_Usuario,	nome_Usuario,	usuario_Usuario,	email_Usuario,	dataNasc_Usuario, status_Usuario FROM usuario";
        $result = mysqli_query($link, $query);
        if(empty($result) === FALSE)
        {
            while (list($id_Usuario,	$nome_Usuario,	$usuario_Usuario,	$email_Usuario,	$dataNasc_Usuario, $status_Usuario) = mysqli_fetch_row($result))
            {
                echo 
                "
                    <center>
                    <table border='tabuleiroUsuarios' align='center' bgcolor=#afbdd4>
                    <tr>
                        <td style='width:67px;height:34px;'>
                            <center>
                            ".
                                    $id_Usuario
                            ."
                            </center>
                        </td> 
                        <td style='width:167px;height:34px;'>
                            <center>
                            ".
                                    $nome_Usuario
                            ."
                            </center>
                        </td> 
                        <td style='width:167px;height:34px;'>
                            <center>
                            ".
                                    $usuario_Usuario
                            ."
                            </center>
                        </td> 
                        <td style='width:330px;height:34px;'>
                            <center>
                            ".
                                    $email_Usuario
                            ."
                            </center>
                        </td> 
                        <td style='width:90px;height:34px;'>
                            <center>
                            ".
                                    $dataNasc_Usuario
                            ."
                            </center>
                        </td> ";
                        if($status_Usuario == 0)
                        {
                            echo "<form name='comentar' action='envioUsuarioRemove.php?idUsuario=".$id_Usuario."' method='post' >
                                <td style='width:69px;height:62px;'>
                                        <input type='submit' value ='Remover'align = 'center' margin='0' style='width:69px;height:62px;'>
                                </td>
                            </form>";
                        }
                        else
                        {
                            echo "<td style='width:69px;height:62px;'>
                                        <center>Demitido</center>
                                </td>";  
                        }
                    echo "</tr>
                </table>
                </center>
                ";
            }
        }
    ?>
    </body>
</html>