<?php

use \struktal\validation\ValidationBuilder;
use \struktal\validation\ValidationException;

test("String datatype validation", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->string()
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input))->toEqual($input)
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("isString");

test("Optional string datatype validation", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->string(false)
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input))->toBeIn([$input, null])
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("isOptionalString");

test("Email datatype validation", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->email()
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input))->toEqual($input)
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("isEmail");

test("Integer datatype validation", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->int()
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input))->toEqual(intval($input))
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("isInteger");

test("Float datatype validation", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->float()
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input))->toEqual(floatval($input))
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("isFloat");

test("Array datatype validation", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->array()
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input))->toEqual($input)
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("isArray");
