<?php

namespace App\AbstractClasses;

abstract class EmailServiceChecker
{
    protected $successor;

    public abstract function sendTransactionalEmail();
    //public function setApiKey($key);

    public function succeedWith(EmailServiceChecker $successor)
    {
        $this->successor = $successor;
    }

    public function next()
    {
        if ($this->successor) {
          return $this->successor->sendTransactionalEmail();
        }

    }
}
