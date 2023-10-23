<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostMail extends Mailable
{
    use Queueable, SerializesModels;

    public $notification;
    public $type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notification,$type)
    {
        $this->notification = $notification;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.post',['notification'=>$this->notification,'type'=>$this->type]);
    }
}
