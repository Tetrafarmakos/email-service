<?php

namespace App\ApiClasses;

use App\AbstractClasses\EmailServiceChecker;
use \Mailjet\Resources;

class TransactionalEmailViaMailjet extends EmailServiceChecker
{
    public function sendTransactionalEmail() {

        $mj = new \Mailjet\Client(env('MJ_APIKEY_PUBLIC'),env('MJ_APIKEY_PRIVATE'),true,['version' => 'v3.1']);
        $body = [
          'Messages' => [
            [
              'From' => [
                'Email' => "billgermanakis@hotmail.com",
                'Name' => "VASILEIOS"
              ],
              'To' => [
                [
                  'Email' => "billgermanakis@gmail.com",
                  'Name' => "VASILEIOS"
                ]
              ],
              'Subject' => "Greetings from Mailjet.",
              'TextPart' => "My first Mailjet email",
              'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
              'CustomID' => "AppGettingStartedTest"
            ]
          ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        //$response->success() && var_dump($response->getData());

        if ($response->success()) {
          return 'email send via mail jet';
        }

        return $this->next();
    }

}
