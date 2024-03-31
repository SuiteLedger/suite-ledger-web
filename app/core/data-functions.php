<?php

function getUserTypes(): array
{
    return array(
        new UserType(1, "Entity"),
        new UserType(2, "Client")
    );
}

function getTypeNameById($typeArray, $id) {
    foreach ($typeArray as $type) {
        if($type->getId() == $id) {
            return $type->getName();
        }
    }
}

function getUserStatuses(): array
{
    return array(
        new UserStatus(USER_STATUS_ACTIVE, "Active"),
        new UserStatus(USER_STATUS_INACTIVE, "Inactive")
    );
}

function validateUserType($userType)
{
    if (in_array($userType, getUserTypes())) {
        return true;
    }
    return false;
}