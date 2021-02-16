<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class WithdrawBalance extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $info;
    public function __construct(User $user,$info=array())
    {
        $this->user=$user;
        $this->info=$info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.withdraw_balance')->with('info',$this->info)
                ->subject('Balance Withdrawal')
                ->to($this->user->email);
    }
}
