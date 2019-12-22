<?php

namespace App\Http\Controllers;

use App\ApiClasses\TransactionalEmailViaMailjet;
use App\ApiClasses\TransactionalEmailViaSendgrig;
use Illuminate\Http\Request;
use App\Jobs\SendEmailViaMailJetJob;
use App\Jobs\SendEmailViaSendGridJob;

class EmailApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function sendTransactionalEmail(Request $request)
    {
        $array_message =  array(
        "subject" => $request->subject,
        "body" => $request->body,
        "address" => $request->address
        );
        $mailjet = new SendEmailViaMailJetJob($array_message);
        $send_grid = new SendEmailViaSendGridJob($array_message);

        $mailjet->succeedWith($send_grid);
        return $this->dispatch($mailjet);
    }
}
