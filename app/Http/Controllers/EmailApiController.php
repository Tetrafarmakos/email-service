<?php

namespace App\Http\Controllers;

use App\ApiClasses\TransactionalEmailViaMailjet;
use App\ApiClasses\TransactionalEmailViaSendgrig;

class EmailApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function sendTransactionalEmail()
    {
        $mailjet = new TransactionalEmailViaMailjet;
        $send_grid = new TransactionalEmailViaSendgrig;

        $mailjet->succeedWith($send_grid);

        return $mailjet->sendTransactionalEmail();
    }
}
