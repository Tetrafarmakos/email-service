<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendEmails extends Model
{
    protected $fillable = [
        'email_service','address','subject'
    ];

    public $timestamps = false;
}
