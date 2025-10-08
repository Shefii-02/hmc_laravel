<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $mobile;
    public $subject_content;
    public $messagess;
    public $recipientType; // 'business' or 'customer'

    public function __construct($name, $email, $mobile, $subject_content, $messagess, $recipientType)
    {
        $this->name = $name;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->subject_content = $subject_content;
        $this->messagess = $messagess;
        $this->recipientType = $recipientType;
    }

    public function build()
    {
        $subjects = $this->recipientType === 'business' ? 'New Contact Form Submission' : 'Thank You for Contacting Us';

        return $this->from('info@hayathmedicare.in')
            ->subject($subjects)
            ->view('emails.contact-form-submitted');
    }
}
