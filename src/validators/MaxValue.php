<?php

namespace struktal\validation\validators;

use \struktal\validation\GenericValidator;
use \struktal\validation\ValidatorInterface;

class MaxValue extends GenericValidator implements ValidatorInterface {
    private int $maxValue;

    public function __construct(int $maxValue) {
        $this->maxValue = $maxValue;
    }

    public static function create(int $maxValue = null): ValidatorInterface {
        return new self($maxValue);
    }

    public function getValidatedValue(mixed &$input): mixed {
        if($input > $this->maxValue) {
            parent::failValidation();
        }

        return $input;
    }
}
