<?php

class PendingPaymentController extends Controller
{

    public function index()
    {
        $this->notFound();
    }

    public function list($apartmentComplexId = '')
    {
        $data['pageTitle'] = "Payments - Pending Approval";

        if(isClientUser()) {
            $apartmentComplexId = getLoggedInUser()->apartment_complex;
        } else {
            if(!empty($apartmentComplexId) && !is_numeric($apartmentComplexId)) {
                $this->notFound();
                die;
            }
        }

        $paymentsModel = new Payment();
        $pendingPayments = $paymentsModel->selectPaymentsByApartmentComplexAndPaymentStatus(
            $apartmentComplexId, PAYMENT_STATUS_PENDING_APPROVAL);

        $data['pendingPayments'] = $pendingPayments;

        $this->view('list-payment-pending-approval', $data);

    }

    public function edit()
    {
        $this->view('edit-payment-proof');
    }

    public function history()
    {
        $this->view('payment-history');
    }




}
