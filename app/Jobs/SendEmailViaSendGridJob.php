<?php

namespace App\Jobs;

use \Mailjet\Resources;
use Log;

class SendEmailViaSendGridJob extends Job
{
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("test@example.com", "Example User");
        $email->setSubject($this->data['subject']);
        $email->addTo($this->data['address'], "Example User");
        $email->addContent("text/plain", $this->data['body']);
        $sendgrid = new \SendGrid(env('SG_APIKEY'));
        $response = $sendgrid->send($email);
        
        if ($response->statusCode() != '200' && $response->statusCode() != '202') {

          abort(503, 'SendGrid out of service.');
        }
    }

    public function failed()
    {
        Log::info('*******************************************2');
        return $this->next($this->data);
    }
}
