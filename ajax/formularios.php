 <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    include ('../config.php');
    require ('../vendor/autoload.php');


    $data = array();
        
    $assunto = 'Nova mensagem do site';
    $corpo = '';

    foreach ($_POST as $key => $value) {
        $corpo.=ucfirst($key).": ".$value;
        $corpo.="<hr>";
    }

    $info = array('assunto' =>$assunto, 'corpo'=>$corpo);
    $mail = new Email('smtp.hostinger.com.br', 'kaique.xavier@agencianexmedia.com.br', '@kaiqueXavier7', 'Kaique');
    $mail->addAdress('contato@agencianexmedia.com.br', 'Kaique');
    $mail->formatarEmail($info);

    if($mail->enviarEmail()){
        $data['sucesso'] = true;
    } else{
        $data['erro'] = true;
    }

    //$data['retorno'] = true;

    die(json_encode($data));
?>                  
