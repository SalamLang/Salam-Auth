<?php

namespace App\Class;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    public static function send($data = '<div>test</div>', $toAddress = 'mohamadreza1388.org@gmail.com', $alt = 'email', $subject = 'Test Email'): bool
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
            $mail->Body = mb_convert_encoding($data, 'UTF-8', 'auto');
            $mail->AltBody = $alt;
            $mail->CharSet = 'UTF-8';

            $mail->send();

            return true;
        } catch (Exception $e) {
            print_r($e);
            dd($e->getMessage());
        }
    }
}
