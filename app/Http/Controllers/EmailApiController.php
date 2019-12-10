<?php

namespace App\Http\Controllers;

use App\Interfaces\EmailServiceInterface;

class EmailApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $emailer;

    public function __construct(EmailServiceInterface $emailer)
    {
        $this->emailer = $emailer;
    }

    public function sendTransactionalEmail()
    {
        return $this->emailer->sendTransactionalEmail();
    }
}
