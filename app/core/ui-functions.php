<?php

function getInputValue($key)
{
    if (!empty($_POST[$key])) {
        return $_POST[$key];
    }
    return '';
}

function getInputClass($key, $errors): string
{
    if (isset($_POST[$key])) {
        if (isset($errors['$key'])) {
            return 'border-danger';
        } else {
            return 'border-success';
        }
    }
    return '';
}

function displayInputError($error): void
{
    echo !empty($error) ? "<small class='text-danger'>$error</small>" : '';
}

function displaySelectOptions($value, $option, $selectedValue): void
{
    $optionString = "<option value='" . $value . "'";
    $optionString .= !empty($selectedValue) && $value == $selectedValue ? " selected>" : ">";
    $optionString .= $option;
    $optionString .= "</option>";
    echo $optionString;
}