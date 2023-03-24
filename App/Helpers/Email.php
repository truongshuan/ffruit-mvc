<?php


namespace App\App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\App\Core\Session;


class Email
{

    private $mail;
    function __construct($email, $code, $content, $url)
    {
        $this->mail = new PHPMailer(true);
        $subject = "Email Verification Code";
        $message = "Your verification code is $code";
        $sender = "xuanptpc04031@fpt.edu.vn";
        if ($this->mail) {
            Session::init();
            $_SESSION['sendMail'] = $content;
            $_SESSION['emailUser'] = $email;
            // $_SESSION['password'] = $password;
            // concac
            $this->mail->IsSMTP(); // telling the class to use SMTP
            $this->mail->SMTPAuth = true; // enable SMTP authentication
            $this->mail->SMTPSecure = "ssl"; // sets the prefix to the servier
            $this->mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
            $this->mail->Port = 465; // set the SMTP port for the GMAIL server
            $this->mail->Username = "xuanptpc04031@fpt.edu.vn"; // GMAIL username
            $this->mail->Password = "Shuan0310."; // GMAIL password
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
            Session::init();
            Session::set('msg', 'Không thể gửi mã OTP!');
        }
    }
}