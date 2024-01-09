<?php

namespace App\Mail\Position;

use App\Models\Positions\Position\Position;
use App\Models\Positions\PositionApplications\PositionApplication;
use App\Models\Widget\TextName;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PositionAccepted extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public PositionApplication $application,
        protected string $creator,
        protected string $acceptor,
        protected string $workflow,
        protected string $comment,
    )
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->creator,
            subject: TextName::getTextTranslation('accepting-succeed'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.positions.accept',
            with: [
                'application' => $this->application,
                'acceptor' => $this->acceptor,
                'workflow' => $this->workflow,
                'comment' => $this->comment
            ]
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
