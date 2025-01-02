<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendApprovedMeeting extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $date;
    public $time;
    public $doctor;

    public function __construct($name,$date, $time,$doctor)
    {
        $this->name = $name;
        $this->date = $date;
        $this->time = $time;
        $this->doctor = $doctor;

    }

    public function build()
    {
        return $this->subject('Your Meeting Is Approved')
                    ->view('emails.approvedMeeting')
                    ->with([
                        'date' => $this->date,
                        'time' => $this->time,
                        'doctor' => $this->doctor,
                        'name' => $this->name,


                    ]);
    }
}
