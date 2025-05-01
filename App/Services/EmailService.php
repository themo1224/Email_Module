<?php

namespace Modules\Email\App\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Modules\Email\App\Contracts\EmailServiceInterface;
use Modules\Email\App\Exceptions\EmailSendingException;
use Modules\Email\App\Mail\BaseMail;

class EmailService implements EmailServiceInterface
{
    /**
     * @var \Illuminate\Mail\Mailer
     */
    protected $mailer;

    public function __construct()
    {
        $this->mailer= Mail::getFacadeRoot();
    }
    /**
     * Send an email immediately
     */
    public function send($to, string $subject, string $view, array $data = [], array $attachments = []): bool
    {
        try {
            if (!view()->exists($view)) {
                throw new \Exception("View '{$view}' does not exist");
            }
            $mail= new BaseMail($subject, $view, $data, $attachments);
            $mail->from(
                Config::get('email.form.address'),
                Config::get('email.from.name'),
            );

            $attempts= Config::get('email.retry.attempts', 1);
            $delay = Config::get('email.retry.delay', 5);
            for($attempts= 1; $attempts <= $attempts; $attempts++){
                
            }

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function queue($to, string $subject, string $view, array $data = [], array $attachments = []): bool
    {
        
    }

     /**
     * Get the mailer instance
     */
    public function mailer()
    {

    }
}
