<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\user;

class ChangeAffiliatStatus extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $message;
    public function __construct(User $user, $message=array())
    {
        $this->user   =$user;
        $this->message=$message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('admin.email.affiliate_status')->with('info',$this->message,'user',$this->user)
        ->subject('User Affiliation')
        ->to($this->user->email);
    }
}
