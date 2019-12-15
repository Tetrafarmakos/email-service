<?php

namespace App\ApiClasses;

use App\AbstractClasses\EmailServiceChecker;

class TransactionalEmailViaSendgrig extends EmailServiceChecker
{
    public function sendTransactionalEmail() {

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("test@example.com", "Example User");
        $email->setSubject("Sending with SendGrid is Fun");
        $email->addTo("billgermanakis@gmail.com", "Example User");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
          "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );
        $sendgrid = new \SendGrid(env('SG_APIKEY'));
        try {
          $response = $sendgrid->send($email);
          // print $response->statusCode() . "\n";
          // print_r($response->headers());
          // print $response->body() . "\n";
        } catch (Exception $e) {
          echo 'Caught exception: '. $e->getMessage() ."\n";
        }

        if ($response->statusCode() == '200' || $response->statusCode() == '202') {
          return 'email send via send grid';
        }

        return $this->next();
    }

}
