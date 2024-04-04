<?php

class Payment extends Model {

    public $errors = [];
    protected $table = "payment";
    protected $allowedColumns = [
        'apartment_unit',
        'amount',
        'comment_by_submiter',
        'submitted_date',
        'status'
        ];

    public function validate($data) {

        $this->errors = [];

        if(empty($this->errors)) {
            return true;
        }

        return false;

    }
}
