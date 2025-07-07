<?php

use \struktal\validation\ValidationBuilder;
use \struktal\validation\ValidationException;

test("String datatype validation", function(mixed $input, bool $passesValidation) {
    $validator = ValidationBuilder::create()
        ->string()
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input))->toEqual($input)
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("isString");

test("Email datatype validation", function(mixed $input, bool $passesValidation) {
    $validator = ValidationBuilder::create()
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
    $validator = ValidationBuilder::create()
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
    $validator = ValidationBuilder::create()
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
    $validator = ValidationBuilder::create()
        ->array()
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input))->toEqual($input)
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("isArray");
