<?php

namespace App\ApiClasses;

use App\Interfaces\SendTransactionalEmailInterface;

class TransactionalEmailViaSendgrig implements SendTransactionalEmailInterface
{
    public function sendTransactionalEmail() {

        return 'email send via send grid';
    }

}
