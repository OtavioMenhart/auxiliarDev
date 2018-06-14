<?php 
if (!isset($_SESSION)) session_start();
   
  // Verifica se não há a variável da sessão que identifica o usuário
  if (isset($_SESSION['LOGIN'])) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: index.php"); exit;
  }
?>

<html>
<head>
    <title> Login de Usuário </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
</head>
<body>
    <form method="POST" action="controllers/validarLogin.php">
        <label>Login:</label>
            <input type="text" name="login" id="login"><br>
        <label>Senha:</label>   
            <input type="password" name="senha" id="senha"><br>
        <input type="submit" value="entrar" id="entrar" name="entrar"><br>
    </form>
</body>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script>
    $(document).ready(()=>{
       $('#entrar').click(function(){
            if($('#login').val() == '' && $('#senha').val() == ''){
                alert('Por favor, informe o login e senha');
                return false;
            }
            else if($('#login').val() == ''){
                alert('Por favor, informe o login');
                return false;
            }
            else if($('#senha').val() == ''){
                alert('Por favor, informe a senha');
                return false;
            }
       });
    });
</script>
</html>

