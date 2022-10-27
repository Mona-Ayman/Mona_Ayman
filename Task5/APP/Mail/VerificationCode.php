<?php
namespace APP\Mail;

use APP\Mail\Contract\Mail;
use PHPMailer\PHPMailer\Exception;

class VerificationCode extends Mail {
    
    public function send() :bool
    {
        try{
            //Recipients
            $this->mail->setFrom('ecommerec.nti@gmail.com', 'NTI Ecommerce'); // mailfrom == mailusername
            $this->mail->addAddress($this->mailTo);               //Name is optional
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = $this->subject;
            $this->mail->Body    = $this->body;

            $this->mail->send();
            // echo 'Message has been sent';
            return true;
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
            return false;
        }
        
    }
}
