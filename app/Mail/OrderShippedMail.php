<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShippedMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $Order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Order)
    {
        //
        $this->Order = $Order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mail.test', ['order'=>$this->Order]);
    }
}
