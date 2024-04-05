<?php

class ReviewPaymentController extends Controller
{
    public function review($paymentId)
    {
        $data['pageTitle'] = "Review Payment";
        $data['pageUrl'] = ROOT_DIRECTORY . PAGE_URL_REVIEW_PAYMENT . "/" . $paymentId;

        $paymentModel = new Payment();
        $payment = $paymentModel->selectOne(['id'=>$paymentId]);
        $data['payment'] = $payment;
        $data['pendingApproval'] = false;
        if($payment->status == PAYMENT_STATUS_PENDING_APPROVAL) {
            $data['pendingApproval'] = true;
        }

        $apartmentUnitModel = new ApartmentUnit();
        $apartmentUnit = $apartmentUnitModel->selectOne(['id'=>$payment->apartment_unit]);
        $data['apartmentUnit'] = $apartmentUnit;

        $apartmentComplexModel = new ApartmentComplex();
        $apartmentComplex = $apartmentComplexModel->selectOne(['id'=>$apartmentUnit->apartment_complex]);
        $data['apartmentComplex'] = $apartmentComplex;

        $paymentTypeModel = new PaymentType();
        $paymentTypes = $paymentTypeModel->selectAll();
        $data['paymentTypes'] = $paymentTypes;

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($paymentModel->validateOnPaymentReview($_POST)) {
                if($_POST["action"] == "approve") {
                    $_POST['status'] = PAYMENT_STATUS_APPROVED;
                } elseif($_POST["action"] == "reject") {
                    unset($_POST['payment_date']);
                    unset($_POST['amount']);
                    unset($_POST['payment_type']);
                    $_POST['status'] = PAYMENT_STATUS_REJECTED;
                }

                $_POST['reviewed_by'] = getLoggedInUser()->id;
                $_POST['reviewed_date'] = getCurrentDateTime();
                $paymentModel->update($paymentId, $_POST);
                setPageMessage(MESSAGE_TYPE_SUCCESS, "Payment status updated successfully.");
                redirect(PAGE_URL_PENDING_PAYMENT . "/" . $apartmentComplex->id);
            }
        }

        $data['errors'] = $paymentModel->errors;

        $this->view('review-payment', $data);
    }

}
