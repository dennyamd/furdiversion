<?php
namespace Commission\Mail;

use Zend\Mail;
use Commission\Entity\Commission;

class Mail
{

    function sendMail($id, array $data)
    {
        $mail = new Mail\Message();

        $text = "New Commission from {$id}.<br>\n";
        $text .= "Request:  {$data['request']}.<br>\n";

        $mail->setBody($text);
        $mail->setFrom('dennyamd@gmail.com', 'Fur Diversion');
        $mail->addTo($data['email'], $data['name']);
        $mail->setSubject('New FurDiversion Commission!');

        $transport = new Mail\Transport\Sendmail();
        $transport->send($mail);
    }
}
