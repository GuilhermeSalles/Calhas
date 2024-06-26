<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Inclui o autoload do Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];

    // Configurações de SMTP
    $mail = new PHPMailer(true);
    try {
        // Configuração do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com'; // Configure com o seu host SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'vendas@calhastaquaral.com.br'; // Insira seu e-mail aqui
        $mail->Password = 'Vendas.123'; // Insira sua senha aqui
        $mail->SMTPSecure = 'ssl'; // tls se preferir usar tls
        $mail->Port = 465; // 587 se preferir usar tls

        // Remetente e destinatário
        $mail->setFrom('vendas@calhastaquaral.com.br'); // Use um e-mail válido configurado na Hostinger
        $mail->addAddress('vendas@calhastaquaral.com.br');

        // Conteúdo do e-mail
        $mail->isHTML(false); // Define se o e-mail será enviado como HTML ou texto simples
        $mail->Subject = $assunto; // Define o assunto do e-mail
        $mail->Body = "E-mail enviado por: $email\n\nMensagem:\n$mensagem"; // Define o corpo do e-mail

        // Envia o e-mail
        $mail->send();
        echo '<script>alert("Mensagem enviada com sucesso!"); window.location.href = "../";</script>';
    } catch (Exception $e) {
        echo '<script>alert("Erro ao enviar mensagem. Por favor, tente novamente mais tarde."); window.location.href = "../";</script>';
        // Descomente a linha abaixo para obter mais detalhes sobre o erro
        echo 'Erro no envio do email: ', $mail->ErrorInfo;
    }
}
