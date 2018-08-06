<?php             
    // session_start inicia a sessão
    session_start();   
    if((isset($_SESSION['idProfiles']) == '1') || (isset($_SESSION['idProfiles']) == '0'))
    {
        echo "<nav id='menuLogin'>
                <ul>
                    <li><a href='mostraUsuarioPainel.php'>Painel:".$_SESSION['usuario']."</a></li>
                        <li><a href='envioUsuarioLogout.php'>Logout</a></li>
                    </ul>
            </nav>";
    }
    else
    {
        echo "<script>
            window.location.href = 'mostraLogar.php';
        </script>";
    }
?>