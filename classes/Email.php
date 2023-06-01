<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }
    public function enviarConfirmacion(){
        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '69864df665b897';
        $mail->Password = 'd6a4d1a166bf05';

        $mail->setFrom("cuentas@appsalon.com");
        $mail->addAddress("cuentas@appsalon.com", "appsalon.com");
        $mail->Subject = "Confirma tu Cuenta";

        //Set HTML
        $mail->isHTML(true); 
        $mail->CharSet = "UTF-8";

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en 
        App Salon, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona Aqui: 
        <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'
        >Confirmar Cuenta</a> </p>";
        $contenido .= "<p>Si ti no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }
    public function enviarInstrucciones(){
        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '69864df665b897';
        $mail->Password = 'd6a4d1a166bf05';

        $mail->setFrom("cuentas@appsalon.com");
        $mail->addAddress("cuentas@appsalon.com", "appsalon.com");
        $mail->Subject = "Reestablece tu Password";

        //Set HTML
        $mail->isHTML(true); 
        $mail->CharSet = "UTF-8";

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado
        reestablecer tu password, sigue el siguiente enlace para hacerlo</p>";
        $contenido .= "<p>Presiona Aqui: 
        <a href='http://localhost:3000/recuperar?token=" . $this->token . "'
        >Reestablecer</a> </p>";
        $contenido .= "<p>Si ti no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }
}