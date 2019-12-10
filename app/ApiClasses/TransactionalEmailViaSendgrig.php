<?php

namespace App\ApiClasses;

use App\Interfaces\EmailServiceInterface;

class TransactionalEmailViaSendgrig implements EmailServiceInterface
{
    public function sendTransactionalEmail() {

        return 'email send via send grid';
    }

}
