<?php

namespace App\ApiClasses;

use App\AbstractClasses\EmailServiceChecker;

class TransactionalEmailViaSendgrig extends EmailServiceChecker
{
    public function sendTransactionalEmail() {

        $email_send = 1;

        if ($email_send) {
          return 'email send via send grid';
        }

        return $this->next();
    }

}
