<?php

namespace App\ApiClasses;

use App\AbstractClasses\EmailServiceChecker;

class TransactionalEmailViaMailjet extends EmailServiceChecker
{
    public function sendTransactionalEmail() {

        $email_send = 1;

        if ($email_send) {
          return 'email send via mail jet';
        }

        return $this->next();
    }

}
