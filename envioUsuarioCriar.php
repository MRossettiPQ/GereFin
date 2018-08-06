<?php
    //Chamado do conexão da pagina
    include 'setupSESSION.php';
    include 'setupConectaBanco.php';
    
    if((empty($_POST['loginNovo'])) || (empty($_POST['senhaNova'])) || (empty($_POST['nomeNovo']))|| (empty($_POST['nascimentoNovo']))|| (empty($_POST['emailNovo'])))
    {        
        echo "<script>
        alert('Todos os campos são obrigatorios.');
            window.history.back();
        </script>";
    }
    else
    {
        $usuario_Usuario = $_POST['loginNovo'];
        $nome_Usuario = $_POST['nomeNovo'];
        $dataNasc_Usuario = $_POST['nascimentoNovo'];
        $email_Usuario = $_POST['emailNovo'];

        $senha_Usuario = md5($_POST['senhaNova']);
        $newLogin = preg_replace('/[^A-Za-z0-9\-]/', '', $usuario_Usuario);

        $query_4 = "SELECT usuario_Usuario FROM usuario WHERE usuario_Usuario='$newLogin'";
        $result_4 = mysqli_query($link, $query_4);
        if(!mysqli_fetch_array($result_4))
        {
            $query = "INSERT INTO usuario (nome_Usuario, senha_Usuario, usuario_Usuario, email_Usuario, dataNasc_Usuario) VALUES ('$nome_Usuario','$senha_Usuario','$newLogin','$email_Usuario','$dataNasc_Usuario')";
            if($link->query($query) === TRUE)
            {

            }
            else
            {
                echo "<br>"."Erro: ".$query."<br>".$link->error;
            }

            $query = "SELECT * FROM usuario WHERE usuario_Usuario='$newLogin' AND senha_Usuario='$senha_Usuario'";
            $result = mysqli_query($link, $query);
            while($row = mysqli_fetch_array($result))
            {       
                $id_Usuario = $row['id_Usuario'];
                $idProfile = $row['tipProfile_Usuario'];

                if (mysqli_num_rows($result) > 0) 
                {
                    // define variaveis da sessão
                    $_SESSION['idProfiles'] = $idProfile;   
                    $_SESSION['idUser'] = $id_Usuario;
                    $_SESSION['usuario'] = $newLogin;
                    $_SESSION['senha'] = $senha_Usuario;   
                    setcookie("usuario", "$newLogin", time() + 3600);
                    setcookie("senha", "$senha_Usuario", time() + 3600);

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
                        window.history.back();
                    </script>";
                }
            }
            $link->close();        
            echo "<script>
                  window.location.href = 'mostraComum.php';
            </script>";
        }
        else
        {
            echo "<script>
               alert('Usuario identico ja cadastrado');
            window.history.back();
            </script>";
        }

    }
?>