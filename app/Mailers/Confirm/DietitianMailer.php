<?php
namespace App\Mailers\Confirm;
use App\Models\Dietitian;
use Illuminate\Contracts\Mail\Mailer;
class DietitianMailer
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
    
    public function sendEmailConfirmationTo(Dietitian $user)
    {
        $this->to = $user->email;
        $this->view = 'auth.dietitian.confirm';
        $this->data = compact('user');
        $this->deliver();
    }
    
    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function ($message) {
            $message
                    ->to($this->to)->subject($this->subject);
        });
    }
}