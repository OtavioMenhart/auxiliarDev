<?php
include '../classes/Crud.php';
include '../classes/LoginPrestadores.php';
$_loginPrestadores = new LoginPrestadores();

$login = strtolower($_POST['login']);
$senha = sha1($_POST['senha']);

if(isset($_POST['entrar'])){
    $_loginPrestadores->setLOGIN($login);
    $_loginPrestadores->setSENHA($senha);
    //echo $_loginPrestadores->verificaLogin();
    if($_loginPrestadores->verificaLogin() > 0){
        $_SESSION['ID_PRESTADOR'] = $_loginPrestadores->pegarID()->idPrestador;
        header("Location: ../index.php");
        
    }else{
        echo
            "<script>
                alert('Usuário ou senha inválido');
                location.href = '../login.php';
            </script>";
    }
    
}


