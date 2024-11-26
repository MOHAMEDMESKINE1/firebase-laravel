<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\MailcoachMailer\Concerns\UsesMailcoachMail;

class EmailMailCoash extends Mailable
{
    use Queueable; 
    use SerializesModels; 
    use UsesMailcoachMail;

    public function build()
    {
       
        $this
        ->from("mohamed-meskine@mailcoach.cloud",'Med')
        ->subject("Welcome to Our Platform Mailcoach")
         ->mailcoachMail('transaction');

    }
    
  

    

   
}
