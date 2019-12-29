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
        $email->setFrom(env('EMAIL_FROM_ADDRESS'), env('EMAIL_FROM_NAME'));
        $email->setSubject($this->data['subject']);
        $email->addTo($this->data['address'], $this->data['name']);
        $email->addContent("text/plain", $this->data['body']);
        $sendgrid = new \SendGrid(env('SG_APIKEY'));
        $response = $sendgrid->send($email);

        if ($response->statusCode() != '200' && $response->statusCode() != '202') {
          abort(503, 'SendGrid out of service.');
        }
        \App\SendEmails::create(['email_service' => 'SendGrid',         
                                 'address' => $this->data['address'],
                                 'subject' => $this->data['subject']]);
    }

    public function failed()
    {
        Log::info('SendGrid out of service.To:'.$this->data['address']);
        return $this->next($this->data);
    }
}
