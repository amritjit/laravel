<?php
namespace App\Mailers\Confirm;
use App\Models\Teacher;
use Illuminate\Contracts\Mail\Mailer;
class TeacherMailer
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
    
    public function sendEmailConfirmationTo(Teacher $user)
    {
        $this->to = $user->email;
        $this->view = 'auth.teacher.confirm';
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