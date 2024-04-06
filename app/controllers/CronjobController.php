<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require '../vendor/phpmailer/phpmailer/src/Exception.php';
//require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
//require '../vendor/phpmailer/phpmailer/src/SMTP.php';

require '../vendor/autoload.php';

class CronjobController extends Controller
{

    public function index()
    {

        try {
            $apartmentUnitAccountModel = new ApartmentUnitAccount();
            $apartmentUnitAccounts = $apartmentUnitAccountModel->getDataForCronJob();

            foreach ($apartmentUnitAccounts as  $apartmentUnitAccount) {

            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = EMAIL_SMTP_HOST;
            $mail->Port = EMAIL_SMTP_PORT;
            $mail->SMTPAuth = true;
            $mail->Username = EMAIL_USERNAME;
            $mail->Password = EMAIL_PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;



            $mail->setFrom(EMAIL_USERNAME);
            $mail->addAddress($apartmentUnitAccount->owner_email);
            $mail->addReplyTo($apartmentUnitAccount->email);
            $mail->isHTML(true);

            $paymentUrl = "http://localhost/suite-ledger-web/public/payment/upload/"
                . $apartmentUnitAccount->apartment_unit;

            $estimatedTotal = $apartmentUnitAccount->balance + $apartmentUnitAccount->monthly_fee
                - $apartmentUnitAccount->approved_payments - $apartmentUnitAccount->pending_approval;
            $estimatedTotal = number_format($estimatedTotal, 2, '.', '');

            $balanceBf = number_format($apartmentUnitAccount->balance, 2,
                '.', '');
            $approvedPayments = number_format($apartmentUnitAccount->approved_payments, 2,
                '.', '');
            $pendingApproval = number_format($apartmentUnitAccount->pending_approval, 2,
                '.', '');
            $thisMonthCharge = number_format($apartmentUnitAccount->monthly_fee, 2,
                '.', '');

            $mail->Subject = "Invoice - " . $apartmentUnitAccount->name . " - " . date("Y") ." ". date("F");
            $template = file_get_contents('../app/views/mail-template.php');
            $template = str_replace('{{COMPANY_NAME}}', $apartmentUnitAccount->name, $template);
            $template = str_replace('{{CUSTOMER_NAME}}', $apartmentUnitAccount->owner_name, $template);
            $template = str_replace('{{INVOICE_DATE}}', getCurrentDate(), $template);
            $template = str_replace('{{DUE_DATE}}',
                date("Y-m-t", strtotime(getCurrentDate())), $template);
            $template = str_replace('{{BALANCE_BF}}', $balanceBf, $template);
            $template = str_replace('{{APPROVED_PAYMENTS}}', $approvedPayments, $template);
            $template = str_replace('{{PENDING_APPROVALS}}', $pendingApproval, $template);
            $template = str_replace('{{THIS_MOTH_CHARGE}}', $thisMonthCharge, $template);
            $template = str_replace('{{COMPANY_EMAIL}}', $apartmentUnitAccount->email, $template);
            $template = str_replace('{{PAYMENT_LINK}}', $paymentUrl, $template);
            $template = str_replace('{{ESTIMATED_TOTAL}}', $estimatedTotal, $template);
            $mail->Body = $template;
            $mail->send();

            }

            echo "Finish executing job ...";
        } catch (\Exception $e) {
            echo "Error occurred";
        }


    }

}
