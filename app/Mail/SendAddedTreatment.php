<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendAddedTreatment extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $invoice;
    
    public $doctor;

    public function __construct($name,$doctor,$invoice)
    {
        $this->name = $name;

        $this->doctor = $doctor;
        $this->invoice = $invoice;


    }

    public function build()
    {
        return $this->subject('Your Treatment has been added')
                    ->view('emails.addedTreatment')
                    ->with([
                       
                        'doctor' => $this->doctor,
                        'name' => $this->name,
                        'invoice'=>$this->invoice,


                    ]);
    }
}
