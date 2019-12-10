<?php

namespace App\ApiClasses;

use App\Interfaces\EmailServiceInterface;

class TransactionalEmailViaMailjet implements EmailServiceInterface
{
    public function sendTransactionalEmail() {

        return 'email send via mail jet';
    }

}
