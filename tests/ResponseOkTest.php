<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\ApiClasses\EmailSetupService;

class ResponseOkTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRsponseOfController()
    {
        $data =  array(
        "subject" => "test subject",
        "body" => "test getBody",
        "address" => "test address",
        "name" => "test name"
        );

        $ess = $this->createMock(EmailSetupService::class);

        $ess->method('setupEmailServices')
             ->willReturn('123456789');

        $this->app->instance(EmailSetupService::class, $ess);

        $response = $this->call('POST', 'sendtestemail', $data);

        $content = json_decode($response->getContent());

        $this->assertEquals(200, $this->response->status());
        $this->assertEquals("123456789", $content->queue_number);
        $this->assertEquals("email successfully in queue", $content->message);
    }
}
