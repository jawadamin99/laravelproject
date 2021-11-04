<?php

namespace App\Mail;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\SerializesModels;

class ForgetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function toMail($notifiable)
    {

    }
    public function build()
    {
        return $this->markdown('emails.users.change_password',[
            'url'=>route('change_password',$this->customer->resetToken($this->customer->UserID).'-'.base64_encode($this->customer->UserID)),
            'customer'=>$this->customer
        ]);
    }
}
