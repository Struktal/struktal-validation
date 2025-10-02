<?php

use \struktal\validation\ValidationBuilder;
use \struktal\validation\ValidationException;

test("Max value 10", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->int()
        ->maxValue(10)
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input))->toEqual($input)
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("maxVal10");

test("Min value 0", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->int()
        ->minValue(0)
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input))->toEqual($input)
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("minVal0");

test("Max value 10 and min value 0", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->int()
        ->maxValue(10)
        ->minValue(0)
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input))->toEqual($input)
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("maxVal10MinVal0");

test("Max length 10", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->string()
        ->maxLength(10)
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input))->toEqual($input)
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("maxLen10");

test("Min length 5", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->string()
        ->minLength(5)
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input))->toEqual($input)
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("minLen5");

test("Max length 10 and min length 5", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->string()
        ->maxLength(10)
        ->minLength(5)
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input))->toEqual($input)
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("maxLen10MinLen5");
