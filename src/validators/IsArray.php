<?php

namespace struktal\validation\validators;

use struktal\validation\internals\GenericValidator;
use struktal\validation\internals\ValidatorInterface;
use struktal\validation\internals\DataTypeValidatorInterface;

class IsArray extends GenericValidator implements ValidatorInterface, DataTypeValidatorInterface {
    public function __construct() {}

    public static function create(): ValidatorInterface {
        return new self();
    }

    public function getValidatedValue(mixed &$input): mixed {
        if(!is_array($input)) {
            parent::failValidation();
        }

        return $input;
    }
}
