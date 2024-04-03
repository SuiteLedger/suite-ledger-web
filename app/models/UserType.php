<?php

class UserType extends Model
{

    public $type;
    public $description;

    public function __construct($type, $description) {
        $this->type = $type;
        $this->description = $description;
    }


}
