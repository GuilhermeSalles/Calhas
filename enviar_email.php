<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    // Configurar o e-mail de destino
    $destinatario = 'vendas@calhastaquaral.com.br';

    // Montar o corpo do e-mail
    $corpo_email = "Email: $email\n";
    $corpo_email .= "Assunto: $assunto\n";
    $corpo_email .= "Mensagem: $mensagem\n";

    // Enviar o e-mail
    if (mail($destinatario, 'Novo contato pelo formulário do Site', $corpo_email)) {
        echo '<script>alert("Mensagem enviada com sucesso!"); window.location.href = "index.html";</script>';
    } else {
        echo '<script>alert("Erro ao enviar mensagem. Por favor, tente novamente mais tarde."); window.location.href = "index.html";</script>';
    }
}
?>
