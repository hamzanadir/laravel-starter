<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class UserMailChanged extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    
        /**
         * Create a new message instance.
         *
         * @param User $user
         */
        public function __construct(User $user)
        {
            $this->user = $user;
        }
    
        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
        {
            return $this->markdown('emails.modification_email_confirm')->subject('Merci de confirmer votre nouveau mail');
        }
}
