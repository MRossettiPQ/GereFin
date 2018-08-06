<html>
<body bgcolor=#d8dfea>
    <?php
        //Chamado do cabeçalho da pagina
        include 'setupCabecalhoLogin.php';
        echo "</br></br>";
        //Chamado do cabeçalho da pagina
        include 'setupCabecalho.php';
        //Chamado do cabeçalho da pagina
        include 'setupPagina.php';
        //Chamado do conexão da pagina
        include 'setupConectaBanco.php';
        echo "
            <center>
            <p> Criação de Usuario <p>

            <form name='criarUsuario' action='envioUsuarioCriar.php' method='post' >
                <table border='formularioCriarUsuario' bgcolor=#afbdd4>
                    <tr>
                        <td>
                            <table border='dadosUsuario' bgcolor=#afbdd4>
                                <tr>
                                    <td style ='width:130px; height:45px;'>
                                        <center>Nome</center> 
                                    </td>
                                    <td style ='width:130px; height:45px;'>
                                        <center>     
                                            <input name='nomeNovo' type='text' align = 'center' style ='width:130px; height:45px;'>
                                        </center> 
                                    </td>
                                    <td style ='width:130px; height:45px;'>
                                        <center>Nascido</center> 
                                    </td>
                                    <td style ='width:130px; height:45px;'>
                                        <center>         
                                            <input name='nascimentoNovo' type='date' align = 'center' style ='width:130px; height:30px;' align='center'>
                                        </center> 
                                    </td>
                                </tr>
                                <tr>
                                <td style ='width:130px; height:45px;'>
                                    <center>Usuario</center> 
                                </td>
                                <td style ='width:130px; height:45px;'>
                                    <center>     
                                        <input name='loginNovo' type='text' align = 'center' style ='width:130px; height:45px;'>
                                    </center> 
                                </td>
                                <td style ='width:130px; height:45px;'>
                                    <center>Email</center> 
                                </td>
                                <td style ='width:130px; height:45px;'>
                                    <center>         
                                        <input name='emailNovo' type='email' value='' align = 'center' style ='width:230px; height:45px;' align='center' placeholder='nome@email.com' required>
                                    </center> 
                                </td>
                            </tr>
                            <tr>
                                <table border='formularioCriarUsuario' bgcolor=#afbdd4>
                                    <td style ='width:312px; height:45px;'>
                                        <center>Senha</center> 
                                    </td>
                                    <td style ='width:320px; height:45px;'>
                                        <center>         
                                            <input name='senhaNova' type='password' align = 'center' style ='width:320px; height:45px;' align='center'>
                                        </center> 
                                    </td>
                                </table>
                            </tr>                               
                            </table>
                        </td>
                    </tr>
                    <table border='formularioBotao' bgcolor=#afbdd4>
                        <tr>
                            <td style='width:648px;height:62px;'>
                                <input type='submit' value ='Criar'align = 'center' margin='0' style='width:648px;height:62px;'>
                            </td>
                        </tr>
                    </table>
                </form>
            </table>
        </center>";
    ?>    
</body>
</html>