<?php

namespace struktal\validation\validators;

use struktal\validation\internals\GenericValidator;
use struktal\validation\internals\ValidatorInterface;

class MinValue extends GenericValidator implements ValidatorInterface {
    private int $minValue;

    public function __construct(int $minValue) {
        $this->minValue = $minValue;
    }

    public static function create(int $minValue = PHP_INT_MIN): ValidatorInterface {
        return new self($minValue);
    }

    public function getValidatedValue(mixed &$input): mixed {
        if($input < $this->minValue) {
            parent::failValidation();
        }

        return $input;
    }
}
