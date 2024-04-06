<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require '../vendor/phpmailer/phpmailer/src/Exception.php';
//require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
//require '../vendor/phpmailer/phpmailer/src/SMTP.php';

require '../vendor/autoload.php';

class InvoiceController extends Controller
{

    public function index()
    {
        try {


            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = EMAIL_SMTP_HOST;
            $mail->Port = EMAIL_SMTP_PORT;
            $mail->SMTPAuth = true;
            $mail->Username = EMAIL_USERNAME;
            $mail->Password = EMAIL_PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $mail->setFrom('amilaliyan@gmail.com');
            $mail->addAddress("naweenniroshan@gmail.com");
            $mail->addReplyTo('info@example.com');
            $mail->isHTML(true);

            $mail->Subject = "Invoice - ABC Apartments - 2024 April";
            $template = file_get_contents('../app/views/mail-template.php');
            $template = str_replace('{CUSTOMER_NAME}', 'Naween', $template);
            $mail->Body = $template;
            $mail->send();

            echo "Mail sent ...";
        } catch (\Exception $e) {
            echo "Error occured";
        }


    }

}
