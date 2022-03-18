<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class leaveApp extends Mailable
{
    use Queueable, SerializesModels;
public $user;
public $hod;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$hod)
    {
        $this->user = $user;
        $this->hod = $hod;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.application');
    }
}
