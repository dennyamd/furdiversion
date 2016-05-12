<?php
namespace Commission\Mail;

use Zend\Mail;
use Commission\Entity\Commission;

class Mail
{

    function sendMail(array $data)
    {
        $mail = new Mail\Message();
        $mail->setBody('This is the text of the email.' . $data['request']);
        $mail->setFrom('dennyamd@gmail.com', 'Fur Diversion');
        $mail->addTo($data['email'], $data['name']);
        $mail->setSubject('New FurDiversion Commission!');

        $transport = new Mail\Transport\Sendmail();
        $transport->send($mail);
    }
}

?>