<?php

namespace App\Jobs;

use \Mailjet\Resources;
use Log;

class SendEmailViaMailJetJob extends Job
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
        $mj = new \Mailjet\Client(env('MJ_APIKEY_PUBLIC'),env('MJ_APIKEY_PRIVATE'),true,['version' => 'v3.1']);
        $body = [
          'Messages' => [
            [
              'From' => [
                'Email' => env('EMAIL_FROM_ADDRESS'),
                'Name' => env('EMAIL_FROM_NAME')
              ],
              'To' => [
                [
                  'Email' => $this->data['address'],
                  'Name' => $this->data['name']
                ]
              ],
              'Subject' => $this->data['subject'],
              'TextPart' => $this->data['body'],
              'CustomID' => "AppGettingStartedTest"
            ]
          ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        if(!$response->success()){abort(503, 'MailJet out of service.');}
        \App\SendEmails::create(['email_service' => 'MailJet',      
                                 'address' => $this->data['address'],
                                 'subject' => $this->data['subject']]);

    }

    public function failed()
    {
        Log::info('MailJet out of service.To:'.$this->data['address']);
        return $this->next($this->data);
    }
}
