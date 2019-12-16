<?php

namespace App\AbstractClasses;

abstract class EmailServiceChecker
{
    protected $successor;

    public abstract function sendTransactionalEmail($data);
    //public function setApiKey($key);

    public function succeedWith(EmailServiceChecker $successor)
    {
        $this->successor = $successor;
    }

    public function next($data)
    {
        if ($this->successor) {
          return $this->successor->sendTransactionalEmail($data);
        }
    }
}
