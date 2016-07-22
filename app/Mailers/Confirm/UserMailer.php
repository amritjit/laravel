<?php
namespace App\Mailers\Confirm;
use App\Models\User;
use Illuminate\Contracts\Mail\Mailer;

class UserMailer
{    
    protected $mailer;
    
    protected $from = 'hgatetech@gmail.com';
   
    protected $to;

    protected $subject = "Please Confirm Your email address";
    
    protected $view;
    
    protected $data = [];
    
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
    
    public function sendEmailConfirmationTo(User $user)
    {
        $this->to = $user->email;
        $this->view = 'auth.emails.confirm';
        $this->data = compact('user');
        $this->deliver();
    }
    
    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function ($message) {
            $message->from($this->from, 'Administrator')
                    ->to($this->to)->subject($this->subject);
        });
    }
}