<?php

namespace App\Http\Controllers;

use App\ApiClasses\EmailSetupService;
use Illuminate\Http\Request;

class EmailApiController extends Controller
{
    protected $emailer;

    public function __construct(EmailSetupService $emailer)
    {
        $this->emailer = $emailer;
    }

    public function sendTransactionalEmail(Request $request)
    {
        $data =  array(
        "subject" => $request->subject,
        "body" => $request->body,
        "address" => $request->address,
        "name" => $request->name
        );

        $email_queue_code = $this->emailer->setupEmailServices($data);

        return response()->json(['queue_number' => $email_queue_code,
                                 'message' => 'email successfully in queue']);
    }
}
