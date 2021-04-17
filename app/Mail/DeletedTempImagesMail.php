<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeletedTempImagesMail extends Mailable
{
    public $data;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('system@gemvist.com')
            ->markdown('emails.temp_images.deletedImages', [
                'filesDeletedSuccessfully' => $this->data["filesDeletedSuccessfully"],
                'filesFailedToDelete' => $this->data["filesFailedToDelete"],
                'message' => $this->data["message"]
            ]);
    }
}
