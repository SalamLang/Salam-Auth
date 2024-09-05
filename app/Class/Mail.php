<?php

namespace App\Class;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    public static function send($data = '<div>email</div>', $toAddress = 'example@gmail.com', $alt = 'email', $subject = 'Test Email'): bool
    {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port = env('MAIL_PORT');

            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($toAddress);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $data;
            $mail->AltBody = $alt;

            $mail->send();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
