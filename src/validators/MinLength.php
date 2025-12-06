<?php

namespace struktal\validation\validators;

use struktal\validation\internals\GenericValidator;
use struktal\validation\internals\ValidatorInterface;

class MinLength extends GenericValidator implements ValidatorInterface {
    private int $minLength;

    public function __construct(int $minLength) {
        $this->minLength = $minLength;
    }

    public static function create(int $minLength = 0): ValidatorInterface {
        return new self($minLength);
    }

    public function getValidatedValue(mixed &$input): mixed {
        if(is_string($input) && strlen($input) < $this->minLength) {
            parent::failValidation();
        } else if(is_array($input) && count($input) < $this->minLength) {
            parent::failValidation();
        }

        return $input;
    }
}
