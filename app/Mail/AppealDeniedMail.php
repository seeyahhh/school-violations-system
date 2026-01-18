<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppealDeniedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $appeal;

    public $record;

    public $user;
    /**
     * Create a new message instance.
     */
    public function __construct($appeal)
    {
        $this->appeal = $appeal;
        $this->record = $appeal->violationRecord;
        $this->user = $this->record?->user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Appeal Denied - ' . $this->appeal->formatCaseId(),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.appeal-denied',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
