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
            <p> Novo contrato <p>

            <form name='criarUsuario'  enctype='multipart/form-data'  action='envioContratoCriar.php' method='post' >
                <table border='formularioCriarJogo' bgcolor=#afbdd4>
                    <tr>
                        <td>    
                            <table border='dadosJogo' bgcolor=#afbdd4>
                                <tr>
                                    <td style ='width:130px; height:50px;'>
                                        <center><b>Titulo</b></center> 
                                    </td>
                                    <td style ='width:630px; height:50px;'>
                                        <center><input name='nomeContrato' value= 'Nome do contrato'type='Text' align='center' style='width:630px;height:50px;'></center> 
                                     </td>
                                <tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border='dadosJogo' bgcolor=#afbdd4>
                                <tr>
                                    <td style ='width:187px; height:45px;'>
                                        <center><b>Codigo Contrato</b></center> 
                                    </td>
                                    <td style ='width:187px; height:45px;'>
                                        <center>
                                            <input name='codigoContrato' type='number' align = 'center' style ='width:187px; height:45px;' align='center'>
                                        </center> 
                                    </td>
                                    <td style ='width:187px; height:45px;'>
                                        <center><b>Data Inicio</b></center>  
                                    </td>
                                    <td style ='width:187px; height:45px;'>
                                        <center>         
                                            <input name='dataContrato' type='date' align = 'center' style ='width:187px; height:45px;' align='center'>
                                        </center> 
                                    </td>
                                </tr>                         
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>    
                            <table border='dadosJogo' bgcolor=#afbdd4>
                                <tr>
                                    <td style ='width:130px; height:50px;'>
                                        <center><b>Cidade</b></center> 
                                    </td>
                                    <td style ='width:630px; height:50px;'>
                                        <center>
                                            <select name='localContrato' style ='width:630px; height:50px;'>
                                                <option value='' selected disabled hidden>Escolha</option>
                                                <option value='Urussanga'>Urussanga</option>
                                                <option value='Orleans'>Orleans</option>
                                                <option value='Criciuma'>Criciuma</option>
                                                <option value='Cocal do Sul'>Cocal do Sul</option>
                                                <option value='Içara'>Içara</option>
                                                <option value='Morro da Fumaça'>Morro da Fumaça</option>
                                                <option value='Porto Alegre'>Porto Alegre</option>
                                                <option value='Florianopolis'>Florianopolis</option>
                                                <option value='Curitiba'>Curitiba</option>
                                            </select> 
                                        </center> 
                                    </td>
                                <tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border='dadosJogo' bgcolor=#afbdd4>
                                <tr>
                                    <td style ='width:630px; height:30px;'>
                                        <center><b>Descrição</b></center> 
                                    </td>
                                <tr>
                                <tr>
                                    <td style ='width:765px; height:100px;'>
                                        <center><textarea cols='30' rows='5' name='descContrato' wrap='hard' value= 'Qual o titulo que você irá sugerir'type='Text' align='center' style='width:765px;height:100px;'></textarea></center> 
                                    </td>
                                <tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border='dadosJogo' bgcolor=#afbdd4>
                                <tr>
                                    <td style ='width:380px; height:35px;'>
                                        <center><b>Orçamento Previsto</b></center> 
                                    </td>
                                    <td style ='width:380px; height:35px;'>
                                        <center><input name='orcaContrato' value= '0'type='number' align='center' style='width:378px;height:35px;'></center> 
                                    </td>
                                <tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>        
                            <input type='submit' value ='Adicionar'align = 'center' margin='0' style='width:775px;height:62px;'>
                        </td>
                    </tr>
                </table>
            </center>
        </form>";
    ?>    
</body>
</html>