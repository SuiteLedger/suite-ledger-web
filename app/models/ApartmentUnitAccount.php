<?php

class ApartmentUnitAccount extends Model {

    public $errors = [];
    protected $table = "apartment_unit_account";
    protected $allowedColumns = [
        'apartment_unit',
        'balance',
        'approved_payments',
        'pending_approval',
        'last_updated_date'
    ];

    public function validate($data, $editItem = false) {

        $this->errors = [];

        if(empty($this->errors)) {
            return true;
        }

        return false;

    }

    public function selectOne($apartmentId)
    {
        return $this->query("SELECT * FROM " . $this->table . " Where apartment_unit =:apartmentUnit",
            ['apartmentUnit' => $apartmentId]);
    }

    public function updatePendingApproval($apartmentId, $amount) {
        $query = "update apartment_unit_account 
            set pending_approval = " . $amount . " where apartment_unit = " . $apartmentId;
        return $this->query($query);
    }

    public function updateBalance($apartmentId, $amount) {
        $query = "update apartment_unit_account 
            set balance = " . $amount . " where apartment_unit = " . $apartmentId;
        return $this->query($query);
    }

    public function updateAprovedPayments($apartmentId, $amount) {
        $query = "update apartment_unit_account 
            set approved_payments = " . $amount . " where apartment_unit = " . $apartmentId;
        return $this->query($query);
    }
}