<?php

namespace struktal\validation;

use struktal\ORM\GenericObjectDAO;
use struktal\validation\internals\DataTypeValidatorInterface;
use struktal\validation\internals\GenericValidator;
use struktal\validation\internals\Validator;
use struktal\validation\validators\IsRequired;

class ValidationBuilder {
    private string $errorMessage = PHP_EOL;
    private array $validators = [];

    private function __construct() {
        // Private constructor to enforce the use of the static create method
    }

    public static function create(): ValidationBuilder {
        return new self();
    }

    public function withErrorMessage(string $message): ValidationBuilder {
        if(empty($this->validators)) {
            $this->errorMessage = $message;
            return $this;
        }

        // Set the error message for the last validator in the chain
        $lastChild = end($this->validators);
        if($lastChild instanceof GenericValidator) {
            $lastChild->setErrorMessage($message);
        }

        // If the last validator is a DataTypeValidatorInterface, use the same error message for potential IsRequired validators
        if($lastChild instanceof DataTypeValidatorInterface) {
            foreach($this->validators as $validator) {
                if($validator instanceof IsRequired) {
                    $validator->setErrorMessage($message);
                }
            }
        }

        return $this;
    }

    public function build(): Validator {
        $validator = new Validator($this->validators);
        $validator->setErrorMessage($this->errorMessage);
        return $validator;
    }

    public function required(): ValidationBuilder {
        $this->validators[] = validators\IsRequired::create();
        return $this;
    }

    public function nullOnEmpty(): ValidationBuilder {
        $this->validators[] = validators\NullOnEmpty::create();
        return $this;
    }

    public function string(bool $required = true, bool $nullOnEmpty = true): ValidationBuilder {
        if($nullOnEmpty) {
            $this->validators[] = validators\NullOnEmpty::create();
        }
        if($required) {
            $this->validators[] = validators\IsRequired::create();
        }
        $this->validators[] = validators\IsString::create();
        return $this;
    }

    public function int(bool $required = true): ValidationBuilder {
        if($required) {
            $this->validators[] = validators\IsRequired::create();
        }
        $this->validators[] = validators\IsInteger::create();
        return $this;
    }

    public function float(bool $required = true): ValidationBuilder {
        if($required) {
            $this->validators[] = validators\IsRequired::create();
        }
        $this->validators[] = validators\IsFloat::create();
        return $this;
    }

    public function email(): ValidationBuilder {
        $this->validators[] = validators\IsEmail::create();
        return $this;
    }

    public function inDatabase(?GenericObjectDAO $dao = null, array $additionalFilters = []): ValidationBuilder {
        $this->validators[] = validators\IsInDatabase::create($dao, $additionalFilters);
        return $this;
    }

    public function minLength(int $minLength): ValidationBuilder {
        $this->validators[] = validators\MinLength::create($minLength);
        return $this;
    }

    public function maxLength(int $maxLength): ValidationBuilder {
        $this->validators[] = validators\MaxLength::create($maxLength);
        return $this;
    }

    public function minValue(int $minValue): ValidationBuilder {
        $this->validators[] = validators\MinValue::create($minValue);
        return $this;
    }

    public function maxValue(int $maxValue): ValidationBuilder {
        $this->validators[] = validators\MaxValue::create($maxValue);
        return $this;
    }

    public function array(bool $required = true): ValidationBuilder {
        if($required) {
            $this->validators[] = validators\IsRequired::create();
        }
        $this->validators[] = validators\IsArray::create();
        return $this;
    }

    public function children(array $children, bool $allowAdditionalFields = false): ValidationBuilder {
        $this->validators[] = new validators\HasChildren($children, $allowAdditionalFields);
        return $this;
    }

    public function properties(array $properties): ValidationBuilder {
        $this->validators[] = new validators\HasProperties($properties);
        return $this;
    }
}
