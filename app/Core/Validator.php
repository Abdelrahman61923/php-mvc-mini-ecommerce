<?php

namespace App\Core;

class Validator
{
    private $errors = [];

    public function required($field, $value)
    {
        if (empty(trim($value))) {
            $this->errors[$field] = ucfirst($field) . " is required.";
        }
    }

    public function email($field, $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = "Invalid email format.";
        }
    }

    public function min($field, $value, $length)
    {
        if (strlen($value) < $length) {
            $this->errors[$field] = ucfirst($field) . " must be at least $length characters.";
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function fails()
    {
        return !empty($this->errors);
    }
}
