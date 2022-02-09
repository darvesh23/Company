<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailCompany extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct()
    {
        //
    }

  
    public function build()
    {
        return $this->subject('Company Successfully Created')->view('welcome');
    }
}
