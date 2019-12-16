<?php

namespace App\Http\Controllers;

use App\ApiClasses\TransactionalEmailViaMailjet;
use App\ApiClasses\TransactionalEmailViaSendgrig;
use Illuminate\Http\Request;

class EmailApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function sendTransactionalEmail(Request $request)
    {
        $mailjet = new TransactionalEmailViaMailjet;
        $send_grid = new TransactionalEmailViaSendgrig;

        $mailjet->succeedWith($send_grid);

        return $mailjet->sendTransactionalEmail($request);
    }
}
