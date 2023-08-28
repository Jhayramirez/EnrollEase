<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyRecord extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData, string $status)
    {
        $this->mailData = $mailData;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->status == 'approved') {
            return $this->subject("EnrollEase - Enrollment Status Update: Your Child's Record Has Been Approved")
                ->view('mail.email_approve');
        } else {
            return $this->subject("EnrollEase - Enrollment Status Update: Your Child's Record Has Been Rejected")
                ->view('mail.email_reject');
        }
    }
}
