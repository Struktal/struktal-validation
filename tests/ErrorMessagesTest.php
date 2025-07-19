<?php

require_once(__DIR__ . "/ValidationErrorMessages.php");

use \struktal\validation\ValidationBuilder;
use \struktal\validation\ValidationException;

test("No string", function(mixed $input, ?string $errorMessage) {
    $validator = ValidationBuilder::create()
        ->string()
        ->withErrorMessage(ValidationerrorMessages::INVALID_STRING->name)
        ->build();

    if(!$errorMessage) {
        expect(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        try {
            $validator->getValidatedValue($input);
            $this->fail("Expected ValidationException to be thrown, but it was not.");
        } catch (ValidationException $e) {
            expect($e->getMessage())->toEqual($errorMessage);
        }
    }
})->with("emNoString");

test("No integer", function(mixed $input, ?string $errorMessage) {
    $validator = ValidationBuilder::create()
        ->int()
        ->withErrorMessage(ValidationerrorMessages::INVALID_INTEGER->name)
        ->build();

    if(!$errorMessage) {
        expect(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        try {
            $validator->getValidatedValue($input);
            $this->fail("Expected ValidationException to be thrown, but it was not.");
        } catch (ValidationException $e) {
            expect($e->getMessage())->toEqual($errorMessage);
        }
    }
})->with("emNoInteger");

test("No float", function(mixed $input, ?string $errorMessage) {
    $validator = ValidationBuilder::create()
        ->float()
        ->withErrorMessage(ValidationerrorMessages::INVALID_FLOAT->name)
        ->build();

    if(!$errorMessage) {
        expect(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        try {
            $validator->getValidatedValue($input);
            $this->fail("Expected ValidationException to be thrown, but it was not.");
        } catch (ValidationException $e) {
            expect($e->getMessage())->toEqual($errorMessage);
        }
    }
})->with("emNoFloat");

test("No array", function(mixed $input, ?string $errorMessage) {
    $validator = ValidationBuilder::create()
        ->array()
        ->withErrorMessage(ValidationerrorMessages::INVALID_ARRAY->name)
        ->build();

    if(!$errorMessage) {
        expect(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        try {
            $validator->getValidatedValue($input);
            $this->fail("Expected ValidationException to be thrown, but it was not.");
        } catch (ValidationException $e) {
            expect($e->getMessage())->toEqual($errorMessage);
        }
    }
})->with("emNoArray");

test("No integer with max value 10", function(mixed $input, ?string $errorMessage) {
    $validator = ValidationBuilder::create()
        ->int()
        ->withErrorMessage(ValidationErrorMessages::INVALID_INTEGER->name)
        ->maxValue(10)
        ->withErrorMessage(ValidationerrorMessages::MAX_VAL_EXCEEDED->name)
        ->build();

    if(!$errorMessage) {
        expect(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        try {
            $validator->getValidatedValue($input);
            $this->fail("Expected ValidationException to be thrown, but it was not.");
        } catch (ValidationException $e) {
            expect($e->getMessage())->toEqual($errorMessage);
        }
    }
})->with("emNoIntWithMaxVal10");

test("No integer with min value 0", function(mixed $input, ?string $errorMessage) {
    $validator = ValidationBuilder::create()
        ->int()
        ->withErrorMessage(ValidationErrorMessages::INVALID_INTEGER->name)
        ->minValue(0)
        ->withErrorMessage(ValidationerrorMessages::MIN_VAL_NOT_REACHED->name)
        ->build();

    if(!$errorMessage) {
        expect(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        try {
            $validator->getValidatedValue($input);
            $this->fail("Expected ValidationException to be thrown, but it was not.");
        } catch (ValidationException $e) {
            expect($e->getMessage())->toEqual($errorMessage);
        }
    }
})->with("emNoIntWithMinVal0");

test("No integer with max value 10 and min value 0", function(mixed $input, ?string $errorMessage) {
    $validator = ValidationBuilder::create()
        ->int()
        ->withErrorMessage(ValidationErrorMessages::INVALID_INTEGER->name)
        ->maxValue(10)
        ->withErrorMessage(ValidationerrorMessages::MAX_VAL_EXCEEDED->name)
        ->minValue(0)
        ->withErrorMessage(ValidationerrorMessages::MIN_VAL_NOT_REACHED->name)
        ->build();

    if(!$errorMessage) {
        expect(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        try {
            $validator->getValidatedValue($input);
            $this->fail("Expected ValidationException to be thrown, but it was not.");
        } catch (ValidationException $e) {
            expect($e->getMessage())->toEqual($errorMessage);
        }
    }
})->with("emNoIntWithMaxVal10MinVal0");

test("No float with max value 10", function(mixed $input, ?string $errorMessage) {
    $validator = ValidationBuilder::create()
        ->float()
        ->withErrorMessage(ValidationErrorMessages::INVALID_FLOAT->name)
        ->maxValue(10)
        ->withErrorMessage(ValidationerrorMessages::MAX_VAL_EXCEEDED->name)
        ->build();

    if(!$errorMessage) {
        expect(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        try {
            $validator->getValidatedValue($input);
            $this->fail("Expected ValidationException to be thrown, but it was not.");
        } catch (ValidationException $e) {
            expect($e->getMessage())->toEqual($errorMessage);
        }
    }
})->with("emNoFloatWithMaxVal10");

test("No float with min value 0", function(mixed $input, ?string $errorMessage) {
    $validator = ValidationBuilder::create()
        ->float()
        ->withErrorMessage(ValidationErrorMessages::INVALID_FLOAT->name)
        ->minValue(0)
        ->withErrorMessage(ValidationerrorMessages::MIN_VAL_NOT_REACHED->name)
        ->build();

    if(!$errorMessage) {
        expect(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        try {
            $validator->getValidatedValue($input);
            $this->fail("Expected ValidationException to be thrown, but it was not.");
        } catch (ValidationException $e) {
            expect($e->getMessage())->toEqual($errorMessage);
        }
    }
})->with("emNoFloatWithMinVal0");

test("No float with max value 10 and min value 0", function(mixed $input, ?string $errorMessage) {
    $validator = ValidationBuilder::create()
        ->float()
        ->withErrorMessage(ValidationErrorMessages::INVALID_FLOAT->name)
        ->maxValue(10)
        ->withErrorMessage(ValidationerrorMessages::MAX_VAL_EXCEEDED->name)
        ->minValue(0)
        ->withErrorMessage(ValidationerrorMessages::MIN_VAL_NOT_REACHED->name)
        ->build();

    if(!$errorMessage) {
        expect(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        try {
            $validator->getValidatedValue($input);
            $this->fail("Expected ValidationException to be thrown, but it was not.");
        } catch (ValidationException $e) {
            expect($e->getMessage())->toEqual($errorMessage);
        }
    }
})->with("emNoFloatWithMaxVal10MinVal0");

test("No string with max length 10", function(mixed $input, ?string $errorMessage) {
    $validator = ValidationBuilder::create()
        ->string()
        ->withErrorMessage(ValidationErrorMessages::INVALID_STRING->name)
        ->maxLength(10)
        ->withErrorMessage(ValidationerrorMessages::MAX_LEN_EXCEEDED->name)
        ->build();

    if(!$errorMessage) {
        expect(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        try {
            $validator->getValidatedValue($input);
            $this->fail("Expected ValidationException to be thrown, but it was not.");
        } catch (ValidationException $e) {
            expect($e->getMessage())->toEqual($errorMessage);
        }
    }
})->with("emNoStringWithMaxLen10");

test("No string with min length 5", function(mixed $input, ?string $errorMessage) {
    $validator = ValidationBuilder::create()
        ->string()
        ->withErrorMessage(ValidationErrorMessages::INVALID_STRING->name)
        ->minLength(5)
        ->withErrorMessage(ValidationerrorMessages::MIN_LEN_NOT_REACHED->name)
        ->build();

    if(!$errorMessage) {
        expect(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        try {
            $validator->getValidatedValue($input);
            $this->fail("Expected ValidationException to be thrown, but it was not.");
        } catch (ValidationException $e) {
            expect($e->getMessage())->toEqual($errorMessage);
        }
    }
})->with("emNoStringWithMinLen5");

test("No string with max length 10 and min length 5", function(mixed $input, ?string $errorMessage) {
    $validator = ValidationBuilder::create()
        ->string()
        ->withErrorMessage(ValidationErrorMessages::INVALID_STRING->name)
        ->maxLength(10)
        ->withErrorMessage(ValidationerrorMessages::MAX_LEN_EXCEEDED->name)
        ->minLength(5)
        ->withErrorMessage(ValidationerrorMessages::MIN_LEN_NOT_REACHED->name)
        ->build();

    if(!$errorMessage) {
        expect(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        try {
            $validator->getValidatedValue($input);
            $this->fail("Expected ValidationException to be thrown, but it was not.");
        } catch (ValidationException $e) {
            expect($e->getMessage())->toEqual($errorMessage);
        }
    }
})->with("emNoStringWithMaxLen10MinLen5");
