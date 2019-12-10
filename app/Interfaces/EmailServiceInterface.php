<?php

namespace App\Interfaces;

interface EmailServiceInterface
{
    public function sendTransactionalEmail();
    //public function setApiKey($key);
}
