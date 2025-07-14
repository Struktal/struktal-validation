<?php

namespace struktal\validation\validators;

use struktal\validation\internals\GenericValidator;
use struktal\validation\internals\ValidatorInterface;
use struktal\validation\internals\DataTypeValidatorInterface;

class IsString extends GenericValidator implements ValidatorInterface, DataTypeValidatorInterface {
    public function __construct() {}

    public static function create(): ValidatorInterface {
        return new self();
    }

    public function getValidatedValue(mixed &$input): mixed {
        if(!is_string($input)) {
            parent::failValidation();
        }

        return $input;
    }
}
