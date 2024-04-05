<?php

class PaymentController extends Controller
{

    public function index()
    {
        $this->notFound();
    }

    public function submit() {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $pageUrl = PAGE_URL_UPLOAD_PAYMENT_PROOF . "/" . $_POST['apartment_unit'];

            $filename = $_FILES['payment_proof_file']['name'];

            $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);

            $storedFileName = uniqid() . "." . $fileExtension;

            $location = __DIR__ . "/../../" . FILE_UPLOAD_DIR . "/" . $storedFileName;

            if(!move_uploaded_file($_FILES['payment_proof_file']['tmp_name'], $location)) {
                setPageMessage(MESSAGE_TYPE_ERROR, "Error occurred. Please try again later.");
                redirect($pageUrl);
                die;
            }

            $apartmentUnitModel = new ApartmentUnit();
            $apartmentUnit = $apartmentUnitModel->selectOne(['id'=>$_POST['apartment_unit']]);

            $paymentModel = new Payment();
            if($paymentModel->validate($_POST)) {
                $_POST['payment_proof'] = $storedFileName;
                $_POST['apartment_complex'] = $apartmentUnit->apartment_complex;
                $_POST['submitted_date'] = getCurrentDateTime();
                $_POST['status'] = PAYMENT_STATUS_PENDING_APPROVAL;
                $paymentModel->insert($_POST);
            }

            setPageMessage(MESSAGE_TYPE_SUCCESS,
                "Payment of Rs. " . $_POST['amount'] . " recorded for verification.");
            redirect($pageUrl);

        }

    }

    public function upload($apartmentUnitId)
    {

        if (!is_numeric($apartmentUnitId)) {
            $this->notFound();
            die;
        }

        $apartmentUnitModel = new ApartmentUnit();
        $apartmentUnit = $apartmentUnitModel->selectOne(["id"=>$apartmentUnitId]);

        if(!$apartmentUnit) {
            $this->notFound();
            die;
        }

        $apartmentComplexModel = new ApartmentComplex();
        $apartmentComplex = $apartmentComplexModel->selectOne(["id"=>$apartmentUnit->apartment_complex]);

        $data['apartmentComplexName'] = $apartmentComplex->name;
        $data['apartmentUnitNo'] = $apartmentUnit->unit_no;
        $data['apartmentUnitId'] = $apartmentUnitId;

        $data['pageTitle'] = "Upload Payment Proof";
        $this->view('upload-payment-proof', $data);
    }

    public function edit()
    {
        $this->view('edit-payment-proof');
    }

    public function history()
    {
        $this->view('payment-history');
    }

    public function list($apartmentComplexId)
    {
        $data['pageTitle'] = "List Payments";

        if(empty($apartmentComplexId) || !is_numeric($apartmentComplexId)) {
            $this->notFound();
            die;
        }

        $paymentModel = new Payment();
        $payments = $paymentModel->selectPaymentsByApartmentComplexAndPaymentStatus($apartmentComplexId);
        $data['payments'] = $payments;

        $paymentTypesModel = new PaymentType();
        $paymentTypes = $paymentTypesModel->selectAll();
        $data['paymentTypes'] = $paymentTypes;

        $this->view('list-payments', $data);
    }

}
