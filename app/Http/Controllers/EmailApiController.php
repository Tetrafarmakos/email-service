<?php

namespace App\Http\Controllers;

use App\Interfaces\SendTransactionalEmailInterface;

class EmailApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $emailer;

    public function __construct(SendTransactionalEmailInterface $emailer)
    {
        $this->emailer = $emailer;
    }

    public function sendTransactionalEmail()
    {
        return $this->emailer->sendTransactionalEmail();
    }
}
