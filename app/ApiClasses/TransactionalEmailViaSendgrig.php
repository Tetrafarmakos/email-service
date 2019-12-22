<?php

namespace App\ApiClasses;

use App\AbstractClasses\EmailServiceChecker;

class TransactionalEmailViaSendgrig extends EmailServiceChecker
{
    public function sendTransactionalEmail($data) {

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("test@example.com", "Example User");
        $email->setSubject($data['subject']);
        $email->addTo($data['address'], "Example User");
        $email->addContent("text/plain", $data['body']);
        $sendgrid = new \SendGrid(env('SG_APIKEY'));
        try {
          $response = $sendgrid->send($email);
        } catch (Exception $e) {
          echo 'Caught exception: '. $e->getMessage() ."\n";
        }

        if ($response->statusCode() == '200' || $response->statusCode() == '202') {
          return 'email send via send grid';
        }

        return $this->next($data);
    }

}
