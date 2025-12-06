<?php

namespace struktal\validation\validators;

use struktal\validation\internals\GenericValidator;
use struktal\validation\internals\ValidatorInterface;

class MaxValue extends GenericValidator implements ValidatorInterface {
    private int $maxValue;

    public function __construct(int $maxValue) {
        $this->maxValue = $maxValue;
    }

    public static function create(int $maxValue = PHP_INT_MAX): ValidatorInterface {
        return new self($maxValue);
    }

    public function getValidatedValue(mixed &$input): mixed {
        if($input > $this->maxValue) {
            parent::failValidation();
        }

        return $input;
    }
}
