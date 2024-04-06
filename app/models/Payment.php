<?php

class Payment extends Model
{

    public $errors = [];
    protected $table = "payment";
    protected $allowedColumns = [
        'apartment_complex',
        'apartment_unit',
        'amount',
        'payment_proof',
        'comment_by_submiter',
        'submitted_date',
        'payment_date',
        'amount',
        'payment_type',
        'comment_by_reviewer',
        'reviewed_by',
        'reviewed_date',
        'status'
    ];

    public function validate($data)
    {

        $this->errors = [];

        if (empty($this->errors)) {
            return true;
        }

        return false;

    }

    public function validateOnPaymentReview($data)
    {

        $this->errors = [];

        if($data["action"] == "reject") {
            if(empty(trim($data["comment_by_reviewer"]))) {
                $this->errors['comment_by_reviewer'] = "Comment is required when rejecting the payment.";
            }
        } elseif ($data["action"] == "approve") {
            if(empty($data["payment_date"])) {
                $this->errors['payment_date'] = "Date is required.";

            } elseif(!isValidDateFormat($data["payment_date"])) {
                $this->errors['payment_date'] = "Date is required.";

            } elseif($data["payment_date"] > getCurrentDate()) {
                $this->errors['payment_date'] = "Payment date should not be a future date.";
            }

            if(empty($data["amount"])) {
                $this->errors['amount'] = "Payment amount is required.";
            }

            if(empty($data["confirm_amount"])) {
                $this->errors['confirm_amount'] = "Please confirm the payment amount.";
            }

            if($data["amount"] != $data["confirm_amount"]) {
                $this->errors['amount'] = "Entered payment amount and confirmed amount does not match.";
                $this->errors['confirm_amount'] = "Entered payment amount and confirmed amount does not match.";
            }
        } else {
            $this->errors['comment_by_reviewer'] = "Invalid action.";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;

    }

    public function selectPaymentsByApartmentComplexAndPaymentStatus($apartmentComplexId='', $paymentStatus = '')
    {
        $query = "SELECT p.*, au.unit_no, ac.name as apartment_complex_name
            FROM ((payment p
            JOIN apartment_unit au
                ON p.apartment_unit = au.id)
            JOIN apartment_complex ac
                ON au.apartment_complex = ac.id)";

        $filter = [];

        if(!empty($apartmentComplexId) || !empty($paymentStatus)) {
            $query .= " WHERE ";
        }

        if(!empty($apartmentComplexId)) {
            $query .= "p.apartment_complex = :apartmentComplexId";
            $filter['apartmentComplexId'] = $apartmentComplexId;
            if(!empty($paymentStatus)) {
                $query .= " AND ";
            }
        }

        if(!empty($paymentStatus)) {
            $query .= "p.status = :paymentStatus";
            $filter['paymentStatus'] = $paymentStatus;
//            return $this->query($query, ['apartmentComplexId' => $apartmentComplexId,
//                'paymentStatus' => $paymentStatus]);
        }

//        return $this->query($query, ['apartmentComplexId' => $apartmentComplexId]);
        return $this->query($query, $filter);
    }

}
