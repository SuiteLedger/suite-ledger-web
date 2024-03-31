<?php

class Type extends Model
{

    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function isValidType($id, $typeArray): bool
    {
        foreach ($typeArray as $type) {
            if($type->id == $id) {
                return true;
            }
        }
        return false;
    }


}
