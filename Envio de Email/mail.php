
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

         date_default_timezone_set("America/Sao_Paulo");

        $postForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($postForm);
        if(!empty($_POST['enviar'])){
            $emailEnvio = '';//email que enviará no caso o email;

            $Erro = true;

            $mail = new PHPMailer();
            $mail->CharSet = "utf8";
            //$mail->SMTPDebug = 3;
            $mail->IsSMTP();
            $mail->SMTPAuth = true;		// Autenticação ativada
            $mail->SMTPSecure = 'tls';	// SSL REQUERIDO pelo GMail
            $mail->Host = 'smtp.gmail.com';	// SMTP utilizado
            $mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
            $mail->Username = "{$emailEnvio}";
            $mail->Password = '';//senha do email de envio;
            $mail->FromName = "{$postForm['email']}";
            $mail->From = "{$postForm['email']}";
            $mail->addAddress("{$emailEnvio}");
            $mail->IsHTML(true);
            $mail->Subject = "{$postForm['assunto']}";
            $mail->Body = "Nome Completo: {$postForm['nome']} <br> Email: {$postForm['email']} <br> Telefone: {$postForm['telefone']} <br> Mensagem: {$postForm['mensagem']} <br>".date("H:i")." - ".date("d/m/Y");
            
            if($mail->send()) {
                echo 'ok';
            }else{
                echo 'error';
            }
        }
    ?>