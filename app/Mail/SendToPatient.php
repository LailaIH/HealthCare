<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendToPatient extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $emailMessage;
    public $doctor;

    public function __construct($user, $emailMessage,$doctor)
    {
        $this->user = $user;
        $this->emailMessage = $emailMessage;
        $this->doctor = $doctor;

    }

    public function build()
    {
        return $this->subject('Your have a new message')
                    ->view('emails.send_email')
                    ->with([
                        'name' => $this->user,
                        'doctor' => $this->doctor,
                        'emailMessage'=>$this->emailMessage,
                    ]);
    }
}
