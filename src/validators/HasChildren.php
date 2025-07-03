<?php

namespace struktal\validation\validators;

use \struktal\validation\GenericValidator;
use \struktal\validation\ValidatorInterface;
use \struktal\validation\ValidationException;

class HasChildren extends GenericValidator implements ValidatorInterface {
    private array $children;
    private bool $allowAdditionalFields;

    public function __construct(array $children = [], bool $allowAdditionalFields = false) {
        $this->children = $children;
        $this->allowAdditionalFields = $allowAdditionalFields;
    }

    public static function create(array $children = [], bool $allowAdditionalFields = false): ValidatorInterface {
        return new self($children, $allowAdditionalFields);
    }

    public function getValidatedValue(mixed &$input): mixed {
        $output = [];

        /**
         * @var string $key
         * @var ValidatorInterface $validator
         */
        foreach($this->children as $key => $validator) {
            try {
                $output[$key] = $validator->getValidatedValue($input[$key]);
            } catch(ValidationException $e) {
                if($e->getMessage() !== PHP_EOL) {
                    throw $e;
                } else {
                    parent::failValidation();
                }
            }
        }

        if($this->allowAdditionalFields) {
            foreach($input as $key => $value) {
                if(array_key_exists($key, $this->children)) {
                    continue;
                }

                $output[$key] = $value;
            }
        }

        return $output;
    }
}
