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
        }

        $paymentsModel = new Payment();
        if(isClientUser()) {
            $pendingPayments = $paymentsModel->selectPaymentsByApartmentComplexAndPaymentStatus(
                $apartmentComplexId, PAYMENT_STATUS_PENDING_APPROVAL);

            $data['pendingPayments'] = $pendingPayments;
        } else {
            $pendingPayments = $paymentsModel->selectAll(['status' => PAYMENT_STATUS_PENDING_APPROVAL]);
            $data['pendingPayments'] = $pendingPayments;
        }

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
