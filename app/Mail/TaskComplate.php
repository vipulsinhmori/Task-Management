<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskComplate extends Mailable
{
    use Queueable, SerializesModels;

    public $task;
    public $subjectLine;

    /**
     * Create a new message instance.
     */
    public function __construct($task, $subject)
    {
        $this->task = $task;
        $this->subjectLine = $subject;
    }

    /**
     * Build the message.
     */
    public function build()
{
    return $this->subject($this->subjectLine)
                ->view('admin.task.taskcomplate')
                ->with(['task' => $this->task]);
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



