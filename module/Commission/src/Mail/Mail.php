<?php
namespace Commission\Mail;

use Zend\Mail;
use Commission\Entity\Commission;

class Mail
{

    function sendMail($id, array $data)
    {
        $body = "New Commission from {$id}.
        Request:  {$data['request']}
        ";
        $transport = new Mail\Transport\Sendmail();

        $mail = new Mail\Message();
        $mail->setBody($body);
        $mail->setFrom('service@furdiversion.net', 'Fur Diversion');
        $mail->addTo($data['email'], $data['name']);
        $mail->setSubject('New FurDiversion Commission from ' . $data['name'] . '!');
        $transport->send($mail);

        if ('service@furdiversion.net' == $data['email']) {
            return;
        }

        // mail to me
        $mail = new Mail\Message();
        $mail->setBody($body);
        $mail->setFrom('service@furdiversion.net', 'Fur Diversion');
        $mail->addTo('service@furdiversion.net', 'Fur Diversion');
        $mail->setSubject('New FurDiversion Commission from ' . $data['name'] . '!');

        $transport->send($mail);
    }
}
