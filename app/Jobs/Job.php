<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Queue;

abstract class Job implements ShouldQueue
{
    /*
    |--------------------------------------------------------------------------
    | Queueable Jobs
    |--------------------------------------------------------------------------
    |
    | This job base class provides a central location to place any logic that
    | is shared across all of your jobs. The trait included with the class
    | provides access to the "queueOn" and "delay" queue helper methods.
    |
    */

    use InteractsWithQueue, Queueable, SerializesModels;

    protected $successor;

    //public abstract function handle($data);
    //public function setApiKey($key);

    public function succeedWith(Job $successor)
    {
        $this->successor = $successor;
    }

    public function next($data)
    {
        if ($this->successor) {
          return Queue::push($this->successor);
        }
    }
}
