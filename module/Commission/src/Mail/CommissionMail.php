<?php
namespace Commission\Mail;

use Zend\Mail;
use Commission\Entity\Commission;

class CommissionMail
{

    function sendMail($id, array $data)
    {
        $body = "Your Commission for your records.
        Request:  {$data['request']}
        ";
        $transport = new Mail\Transport\Sendmail();

        $mail = new Mail\Message();
        $mail->setBody($body);
        $mail->setFrom('service@furdiversion.net', 'Fur Diversion');
        $mail->addTo($data['email'], $data['name']);
        $mail->setSubject('Your FurDiversion Commission!');
        $transport->send($mail);

        if ('service@furdiversion.net' == $data['email']) {
            return;
        }

        $body = "New Commission from {$id}.
        Request:  {$data['request']}
        ";

        // mail to me
        $mail = new Mail\Message();
        $mail->setBody($body);
        $mail->setFrom('service@furdiversion.net');
        $mail->addTo('service@furdiversion.net', 'Fur Diversion');
        $mail->setSubject('New FurDiversion Commission from ' . $data['email'] . ', ' . $data['name'] . '!');

        $transport->send($mail);
    }
}
