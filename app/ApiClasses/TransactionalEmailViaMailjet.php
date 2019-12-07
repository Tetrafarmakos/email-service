<?php

namespace App\ApiClasses;

use App\Interfaces\SendTransactionalEmailInterface;

class TransactionalEmailViaMailjet implements SendTransactionalEmailInterface
{
    public function sendTransactionalEmail() {

        return 'email send via mail jet';
    }

}
