<?php

namespace struktal\validation\validators;

use struktal\validation\internals\GenericValidator;
use struktal\validation\internals\ValidatorInterface;

class IsEmail extends GenericValidator implements ValidatorInterface {
    public function __construct() {}

    public static function create(): ValidatorInterface {
        return new self();
    }

    public function getValidatedValue(mixed &$input): mixed {
        if(!is_string($input)) {
            parent::failValidation();
        }

        if(!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            parent::failValidation();
        }

        return strtolower($input);
    }
}
