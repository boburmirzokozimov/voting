<?php

namespace App\Mail;

use App\Models\Idea;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class IdeaStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(private Idea $idea)
    {

    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Idea Status Updated',
        );
    }

    public function build()
    {
        return $this->markdown('mail.idea-status-updated', ['idea' => $this->idea]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
