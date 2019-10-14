<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNames extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->names = $data['names'];
        $this->pdf = $data['pdf'];
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->replyTo($this->data['email'], $this->data['name'])
        ->subject($this->data['subject'])
        ->attachData($this->pdf->output(), 'Baby-Names.pdf', [
            'mime' => 'application/pdf',
        ])
        ->markdown('emails.send.names');
        //->with('names', $this->names);
    }
}
