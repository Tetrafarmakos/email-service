<?php

namespace App\ApiClasses;

use App\Jobs\SendEmailViaMailJetJob;
use App\Jobs\SendEmailViaSendGridJob;
use Queue;

class EmailSetupService
{
    public function setupEmailServices($data) {

        $mailjet = new SendEmailViaMailJetJob($data);
        $send_grid = new SendEmailViaSendGridJob($data);
        $mailjet->succeedWith($send_grid);
        
        return Queue::push($mailjet);
    }

}
