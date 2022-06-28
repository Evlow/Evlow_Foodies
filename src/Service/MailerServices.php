<?php
namespace App\Service;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

class MailerService
{
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer =$mailer;
    }

    public function sendEmail($email, $token)
    {
        $email = (new Email())
        ->from('register@example.fr')
        ->to('evlow92@gmail.com')
        ->subject('Inscription Evlow Foodies')
        ->text('Sending emails is fun again!')
        ->html('email/registration.html.twig')
        ->context([
            "token" =>$token
        ]);
        $this->mailer->send($email);
    }
}
