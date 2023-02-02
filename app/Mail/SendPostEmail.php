<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendPostEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post, $body)
    {
        $this->post = $post;
        $this->body = $body;
    }

    public function build()
    {
        $email = $this->subject('New Post')->view('emails.send_post');

        $this->with([
            'post' => $this->post,
            'body' => $this->body,
        ]);

        return $email;
    }
}
