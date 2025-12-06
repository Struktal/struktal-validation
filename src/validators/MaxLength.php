<?php

namespace struktal\validation\validators;

use struktal\validation\internals\GenericValidator;
use struktal\validation\internals\ValidatorInterface;

class MaxLength extends GenericValidator implements ValidatorInterface {
    private int $maxLength;

    public function __construct(int $maxLength) {
        $this->maxLength = $maxLength;
    }

    public static function create(int $maxLength = 0): ValidatorInterface {
        return new self($maxLength);
    }

    public function getValidatedValue(mixed &$input): mixed {
        if(is_string($input) && strlen($input) > $this->maxLength) {
            parent::failValidation();
        } else if(is_array($input) && count($input) > $this->maxLength) {
            parent::failValidation();
        }

        return $input;
    }
}
