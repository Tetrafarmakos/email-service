<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendJsonForEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cmd:send-json-for-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send json for transactional email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $client = new \GuzzleHttp\Client();

      $array_message =  array(
      "subject" => "Transaction",
      "body" => "Transaction information",
      "address" => "billgermanakis@gmail.com",
      "name" => "Bill"
      );

      $result = $client->request('POST', route('send.email'), [ 
          'json' => $array_message
      ]);

      $this->info($result->getBody());
    }
}
