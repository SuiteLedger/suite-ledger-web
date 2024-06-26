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

function getItemStatuses(): array
{
    return array(
        new UserStatus(STATUS_ACTIVE, "Active"),
        new UserStatus(STATUS_INACTIVE, "Inactive"),
        new UserStatus(STATUS_DELETED, "Deleted"),
    );
}

function getPaymentStatuses(): array
{
    return array(
        new PaymentStatus(PAYMENT_STATUS_PENDING_APPROVAL, "Pending Approval"),
        new PaymentStatus(PAYMENT_STATUS_APPROVED, "Approved"),
        new PaymentStatus(PAYMENT_STATUS_REJECTED, "Rejected"),
    );
}

function getPaymentTypeNameByTypeId($paymentTypes, $id) {
    foreach ($paymentTypes as $type) {
        if($type->id == $id) {
            return $type->name;
        }
    }
}

function validateUserType($userType)
{
    if (in_array($userType, getUserTypes())) {
        return true;
    }
    return false;
}