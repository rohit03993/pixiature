<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnrollmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $studentData;

    public function __construct($studentData)
    {
        $this->studentData = $studentData;
    }

    public function build()
    {
        return $this->subject('Welcome to Pixature Design Sprint!')
                    ->view('emails.enrollment-confirmation');
    }
}

