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

                $apartmentUnitAccountModel = new ApartmentUnitAccount();
                $apartmentUnitAccount = $apartmentUnitAccountModel
                    ->selectOne(['apartment_unit' => $apartmentUnit->id]);
                $pendingApprovalAmount = $apartmentUnitAccount->pending_approval + $_POST['amount'];
                $apartmentUnitAccountModel->updatePendingApproval($apartmentUnit->id, $pendingApprovalAmount);

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

    public function list($apartmentComplexId ='')
    {

        if(!Authentication::userHasPermission(USER_PERMISSION_LIST_PAYMENTS)) {
            $this->unauthorized();
            die;
        }

        $data['pageTitle'] = "List Payments";

        if(isClientUser()) {
            $apartmentComplexId = getLoggedInUser()->apartment_complex;
        } else {
            if(!empty($apartmentComplexId) && !is_numeric($apartmentComplexId)) {
                $this->notFound();
                die;
            }
        }

        $data['apartmentComplexId'] = $apartmentComplexId;

        $paymentModel = new Payment();
        $payments = $paymentModel->selectPaymentsByApartmentComplexAndPaymentStatus($apartmentComplexId);
        $data['payments'] = $payments;

        $paymentTypesModel = new PaymentType();
        $paymentTypes = $paymentTypesModel->selectAll();
        $data['paymentTypes'] = $paymentTypes;

        $this->view('list-payments', $data);
    }

    public function export($apartmentComplexId = '') {

        if(!Authentication::userHasPermission(USER_PERMISSION_EXPORT_PAYMENTS)) {
            $this->unauthorized();
            die;
        }

        if(isClientUser()) {
            $apartmentComplexId = getLoggedInUser()->apartment_complex;
        } else {
            if(!empty($apartmentComplexId) && !is_numeric($apartmentComplexId)) {
                $this->notFound();
                die;
            }
        }

        $paymentModel = new Payment();
        $payments = $paymentModel
            ->selectPaymentsByApartmentComplexAndPaymentStatus($apartmentComplexId);

        if(count($payments) < 1) {
            setPageMessage(MESSAGE_TYPE_SUCCESS, "No records found to export");
            redirect(PAGE_URL_LIST_PAYMENT . "/" . $apartmentComplexId);
        }

//        $apartmentComplexModel = new ApartmentComplex();
//        $apartmentComplex = $apartmentComplexModel->selectOne(['id' => $apartmentComplexId]);


        $paymentTypeModel = new PaymentType();
        $paymentTypes = $paymentTypeModel->selectAll();

        $delimiter = ",";
        $filename = "payments-" . getCurrentDateTime() . ".csv";

        $file = fopen ('php://memory', 'w');

        $fields = array ('Apartment Complex',
            'Apartment Unit',
            'Amount',
            'Payment Type',
            'Submitted Date',
            'Reviewed Date',
            'Status');
        fputcsv($file, $fields, $delimiter);

        foreach ($payments as $payment) {
            $row = array($payment->apartment_complex_name,
                $payment->unit_no,
                $payment->amount,
                getPaymentTypeNameByTypeId($paymentTypes, $payment->payment_type),
                $payment->submitted_date,
                $payment->reviewed_date,
                getTypeNameById(getPaymentStatuses(),  $payment->status)
                );
            fputcsv($file, $row, $delimiter);
        }

        fseek($file, 0);


        header ( 'Content-Type: text/csv');
        header ('Content-Disposition: attachment; filename="' . $filename . '";');

        fpassthru($file);

    }

}
