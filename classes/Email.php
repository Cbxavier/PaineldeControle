<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';

class Email {
    private $mailer;

    public function __construct($host, $username, $senha, $nome) {
        $this->mailer = new PHPMailer();

        // Server settings
        $this->mailer->SMTPDebug = 0;
        $this->mailer->isSMTP();
        $this->mailer->Host = $host;
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $username;
        $this->mailer->Password = $senha;
        $this->mailer->SMTPSecure = 'ssl';
        $this->mailer->Port = 465;

        $this->mailer->setFrom($username, $nome);
        $this->mailer->isHTML(true);

        $this->mailer->Charset = 'UTF-8';
    }

    public function addAdress($email, $nome) {
        $this->mailer->addAddress($email, $nome);
    }

    public function formatarEmail($info) {
        $this->mailer->Subject = $info['assunto'];
        $this->mailer->Body = $info['corpo'];
        $this->mailer->AltBody = strip_tags($info['assunto']);
    }

    public function enviarEmail() {
        if ($this->mailer->send()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
