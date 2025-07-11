<?php

namespace struktal\validation\validators;

use struktal\validation\internals\GenericValidator;
use struktal\validation\internals\ValidatorInterface;

class IsRequired extends GenericValidator implements ValidatorInterface {
    private bool $checkWithEmpty;

    public function __construct(bool $checkWithEmpty = false) {
        $this->checkWithEmpty = $checkWithEmpty;
    }

    public static function create(bool $checkWithEmpty = false): ValidatorInterface {
        return new self($checkWithEmpty);
    }

    public function getValidatedValue(mixed &$input): mixed {
        if($this->checkWithEmpty) {
            if(empty($input)) {
                parent::failValidation();
            }
        } else {
            if(!isset($input)) {
                parent::failValidation();
            }
        }

        return $input;
    }
}
