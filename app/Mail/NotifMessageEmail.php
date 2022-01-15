<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifMessageEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $id,$qty;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id,$qty)
    {
        //
        $this->id = $id;
        $this->qty = $qty;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('yyyy@gmail.com')
                   ->view('messagebody')
                   ->with(
                    [
                        'sku' => $this->id,
                        'qty' => $this->qty,
                    ]);
    }
}
