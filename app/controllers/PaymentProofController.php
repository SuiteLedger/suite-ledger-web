<?php

class PaymentProofController extends Controller
{

    public function index()
    {
        $this->view('list-payment-proofs');
    }

    public function upload()
    {
        $this->view('upload-payment-proof');
    }

    public function edit()
    {
        $this->view('edit-payment-proof');
    }

    public function history()
    {
        $this->view('payment-history');
    }

    public function list()
    {
        $this->view('list-payment-proofs');
    }

}
