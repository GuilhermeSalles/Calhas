<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];

    // E-mail de destino
    $to = 'vendas@calhastaquaral.com.br';

    // Assunto do e-mail
    $subject = $assunto;

    // Construir a mensagem
    $message = "E-mail enviado por: $email\n\n";
    $message .= "Mensagem:\n$mensagem";

    // Cabeçalhos do e-mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=utf-8\r\n";

    // Configurações do servidor SMTP
    ini_set('SMTP', 'smtp.hostinger.com');
    ini_set('smtp_port', 465);
    ini_set('sendmail_from', 'vendas@calhastaquaral.com.br');

    // Enviar e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo '<script>alert("Mensagem enviada com sucesso!"); window.location.href = "../";</script>';
    } else {
        echo '<script>alert("Erro ao enviar mensagem. Por favor, tente novamente mais tarde."); window.location.href = "../";</script>';
    }
}
?>
