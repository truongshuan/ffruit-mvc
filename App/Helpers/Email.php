<?php


namespace App\App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\App\Core\Session;


class Email
{
    private $mail;
    function __construct()
    {
        $this->mail = new PHPMailer();
    }
    public function MailOTP($email, $code, $content, $url): void
    {
        $subject = "Email Verification Code";
        $message = "Your verification code is $code";
        $sender = "truongshuan0310@gmail.com";
        if ($this->mail) {
            Session::setSuccess('sendMail', $content);
            Session::setSuccess('emailUser', $email);
            $this->mail->SMTPDebug = 0;
            $this->mail->CharSet = 'UTF-8';
            $this->mail->IsSMTP(); // telling the class to use SMTP
            $this->mail->SMTPAuth = true; // enable SMTP authentication
            $this->mail->SMTPSecure = "tls"; // sets the prefix to the servier
            $this->mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
            $this->mail->Port =  587; // set the SMTP port for the GMAIL server
            $this->mail->Username = "truongshuan0310@gmail.com"; // GMAIL username
            $this->mail->Password = "snkztnktpsmiasus"; // GMAIL password
            $this->mail->AddAddress($email);
            $this->mail->SetFrom($sender, 'Admin: FFruit');
            $this->mail->Subject = $subject;
            $this->mail->Body = $message;
            $this->mail->Send();
            if ($url != "forgot") {
                header("Location:" . ROOT_URL . "UserController/otp");
            } else {
                header("Location:" . ROOT_URL . "ForgotController/resetOTP");
            }
            exit();
        } else {
            Session::setError('sendMail', 'Không thể gửi mã');
        }
    }
    public function MailCheckout($email, $content, $url)
    {
        $subject = "Email CheckOut Order";
        $message = "$content";
        $sender = "truongshuan0310@gmail.com";
        if ($this->mail) {
            $this->mail->SMTPDebug = 0;
            $this->mail->CharSet = 'UTF-8';
            $this->mail->IsSMTP(); // telling the class to use SMTP
            $this->mail->SMTPAuth = true; // enable SMTP authentication
            $this->mail->SMTPSecure = "ssl"; // sets the prefix to the servier
            $this->mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
            $this->mail->Port = 465; // set the SMTP port for the GMAIL server
            $this->mail->Username = "truongshuan0310@gmail.com"; // GMAIL username
            $this->mail->Password = "snkztnktpsmiasus"; // GMAIL password
            $this->mail->AddAddress($email);
            $this->mail->SetFrom($sender, 'Admin: FFruit');
            $this->mail->Subject = $subject;
            $this->mail->Body = $message;
            $this->mail->Send();
            if ($url === "checkouted") {
                header('location:' . ROOT_URL . 'CheckoutController/thank');
            } else {
                header('location:' . ROOT_URL . 'HomeController/homePage');
            }
            exit();
        } else {
            Session::setError('sendMail', 'Không thể gửi!');
        }
    }
}
