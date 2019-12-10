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

      $info_for_email = '{

          "subject": "x",

          "body": "asdasdasd",

          "address": "asdasd",
      }';

      $result = $client->request('POST', url('http://takeaway.test/sendtestemail'), [
          'body' => $info_for_email
      ]);

      $this->info($result->getBody());
    }
}
