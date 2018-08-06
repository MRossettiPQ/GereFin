<?php
    //Chamado do conexão da pagina
    include 'setupSESSION.php';
    include 'setupConectaBanco.php';
    
    if(empty($_POST["Usuario"]) || empty($_POST["Senha"])) //VERIFICA SE OS CAMPOS FORAM ENVIADOS VAZIOS
    {
        echo "
        <script>
            alert('O campo Usuario e Senha são obrigatorios.');
            window.history.back();
        </script>";
    }
    else
    {
        $Usuario = $_POST["Usuario"];
        $Senha = $_POST["Senha"];
        
        $novoUsuario = preg_replace('/[^A-Za-z0-9\-]/', '', $Usuario);
        $novaSenha = md5($Senha);
        
        $query = "SELECT * FROM usuario WHERE usuario_Usuario='$novoUsuario' AND senha_Usuario='$novaSenha'";
        $result = mysqli_query($link, $query);
        while($row = mysqli_fetch_array($result))
        {       
            $id_Usuario = $row['id_Usuario'];
            $tipProfile_Usuario = $row['tipProfile_Usuario'];
            $status_Usuario = $row['status_Usuario'];

            if ((mysqli_num_rows($result) > 0) && ($status_Usuario == 0))
            {
                // define variaveis da sessão
                $_SESSION['idProfiles'] = $tipProfile_Usuario;   
                $_SESSION['idUser'] = $id_Usuario;
                $_SESSION['usuario'] = $novoUsuario;
                $_SESSION['senha'] = $novaSenha;   
                setcookie("usuario", "$novoUsuario", time() + 3600);
                setcookie("senha", "$novaSenha", time() + 3600);

                //Redireciona para a página inicial    
                echo "<script>
                    window.location.href = 'mostraPrincipal.php';
                </script>";
            } 
            else 
            {
                //Limpa
                unset($_SESSION['idUser']);
                unset($_SESSION['idProfiles']);
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                setcookie("usuario", '', time() - 3600);
                setcookie("senha", '', time() - 3600);
                //Destrói
                session_abort();  

                //Redireciona para a página de anterior     
                echo "<script>
                    window.location.href = 'mostraLogar.php';
                </script>";
            }
        }
    }
?>