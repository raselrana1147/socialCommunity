<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\user;

class ConvertCredit extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $convert;
    public function __construct(User $user,$convert=array())
    {
        $this->user=$user;
        $this->convert=$convert;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.convert_credit')->with('convert',$this->convert)
        ->subject('Credit Convertion')
        ->to($this->user->email);
    }
}
