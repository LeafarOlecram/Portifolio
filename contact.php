<?php
    header('Content-Type: application/json; charset=utf-8');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require __DIR__ . '/src/Exception.php';
    require __DIR__ . '/src/PHPMailer.php';
    require __DIR__ . '/src/SMTP.php';
    require __DIR__ . '/config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Verificação de resposta do reCaptcha
        $recaptcha = $_POST['g-recaptcha-response'] ?? '';

        $response = file_get_contents(
            "https://www.google.com/recaptcha/api/siteverify?secret=" . SECRET_KEY . "&response=" . $recaptcha
        );
        $responseKeys = json_decode($response, true);

        if (!$responseKeys["success"]) {
            echo json_encode(["success" => false, "message" => "⚠️ Verificação de segurança falhou."]);
            exit;
        }

        //Sanitizar e verificar dados de entrada
        $nome = htmlspecialchars($_POST['nome']);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $mensagem = htmlspecialchars($_POST['mensagem']);

        //Verificação de e-mail válido
        if (!$email) {
            echo json_encode(["success" => false, "message" => "⚠️ Email inválido."]);
            exit;
        }

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = MAIL_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = MAIL_USERNAME;
            $mail->Password   = MAIL_PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = MAIL_PORT;
            $mail->CharSet    = 'UTF-8';

            $mail->setFrom(MAIL_USERNAME, 'Meu Portfólio');
            $mail->addReplyTo($email, $nome);
            $mail->addAddress(MAIL_USERNAME, 'Marcelo');

            $mail->isHTML(true);
            $mail->Subject = '📩 Contato via portfólio';
            $mail->Body    = "<strong>De:</strong> $nome &lt;$email&gt;<br><br>$mensagem";
            $mail->AltBody = "De: $nome <$email>\n\n$mensagem";

            $mail->send();
            echo json_encode(["success" => true, "message" => "✅ Mensagem enviada com sucesso!"]);
        } catch (Exception $e) {
            echo json_encode(["success" => false, "message" => "❌ Erro ao enviar: {$mail->ErrorInfo}"]);
        }
    }