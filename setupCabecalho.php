<?php        
    if(isset ($_SESSION['idProfiles']) == true)
    {
        if($_SESSION['idProfiles'] == '0')
        {
            echo "
            <form name='formPesquisar' action='mostraPesquisa.php' method='post' >
                <nav id='menuLogin'>     
                    <ul>
                        <li><a href='mostraPrincipal.php'>HOME</a></li>
                        <li><a href='mostraComum.php'>Listar Contratos</a></li>
                        <li><a href='mostraUsuario.php'>Listar Funcionarios</a></li>    
                        <li><a href='mostraCadastroContrato.php'>Cadastro Contrato</a></li>
                        <li><a href='mostraCadastroUsuario.php'>Cadastro Usuario</a></li>
                    </ul>
                </nav>
            </form>";
        }
        else
        {
            echo "
            <form name='formPesquisar' action='mostraPesquisa.php' method='post' >
                <nav id='menuLogin'>     
                    <ul>
                        <li><a href='mostraPrincipal.php'>HOME</a></li>
                        <li><a href='mostraComum.php'>Listar Contratos</a></li>
                        <li><a href='mostraCadastroContrato.php'>Cadastro Contrato</a></li>
                    </ul>
                </nav>
            </form>";
        }
    }
    else
    {
        echo "<script>
            window.location.href = 'mostraLogar.php';
        </script>";
    }
?>