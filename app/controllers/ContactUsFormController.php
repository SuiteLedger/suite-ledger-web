<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

class ContactUsFormController extends Controller
{

    public function index()
    {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            try{

                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host = EMAIL_SMTP_HOST;
                $mail->Port = EMAIL_SMTP_PORT;
                $mail->SMTPAuth = true;
                $mail->Username = EMAIL_USERNAME;
                $mail->Password = EMAIL_PASSWORD;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                $mail->setFrom(EMAIL_USERNAME);
                $mail->addAddress(EMAIL_USERNAME);
                $mail->addReplyTo($_POST['email']);
                $mail->isHTML(true);

                $mail->Subject = "Inquiry From - " . $_POST['fullName'];
                $mail->Body = $_POST['message'];
                $mail->send();

               setPageMessage(MESSAGE_TYPE_SUCCESS,
                   "Your message sent to SuiteLedger support team.");
            } catch (\Exception $e) {
                setPageMessage(MESSAGE_TYPE_ERROR,
                    "Error occurred while sending the message. Please try again later");
            }

            redirect("/#contact");

        }


    }

}
