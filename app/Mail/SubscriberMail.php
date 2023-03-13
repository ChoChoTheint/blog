<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscriberMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $comment;
    public function __construct($user, $comment)
    {
        $this->user = $user;
        $this->comment = $comment;
    }

    public function build()
    {
        return $this->view('email.subscriber-mail', [
            'user' => $this->user,
            'comment' => $this->comment
        ]);
    }
}