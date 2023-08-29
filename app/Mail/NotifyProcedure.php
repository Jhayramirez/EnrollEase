<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyProcedure extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    public $enrollmentLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData, $enrollmentLink)
    {
        $this->mailData = $mailData;
        $this->enrollmentLink = $enrollmentLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('EnrollEase - Enrollment Procedure')
            ->view('mail.email_procedure')
            ->with([
                'mailData' => $this->mailData,
                'enrollmentLink' => $this->enrollmentLink,
            ]);
    }
}
