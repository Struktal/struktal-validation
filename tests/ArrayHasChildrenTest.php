<?php

use \struktal\validation\ValidationBuilder;
use \struktal\validation\ValidationException;

test("Required string child", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->array()
        ->children([
            "name" => (new ValidationBuilder())
                ->string()
                ->build()
        ])
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input)["name"])->toEqual($input["name"])
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("requiredString");

test("Optional string child", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->array()
        ->children([
            "name" => (new ValidationBuilder())
                ->string(false)
                ->build()
        ])
        ->build();

    $expectedName = null;
    if(!empty($input["name"])) {
        $expectedName = $input["name"];
    }

    if($passesValidation) {
        expect($validator->getValidatedValue($input)["name"])->toEqual($expectedName)
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("optionalString");

test("Array child", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->array()
        ->children([
            "details" => (new ValidationBuilder())
                ->array()
                ->children([
                    "name" => (new ValidationBuilder())
                        ->string()
                        ->build(),
                    "age" => (new ValidationBuilder())
                        ->int()
                        ->build()
                ])
                ->build()
        ])
        ->build();

    if($passesValidation) {
        expect($validator->getValidatedValue($input))->toEqual($input)
            ->and(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("nestedArray");

test("Array with additional fields", function(mixed $input, bool $passesValidation) {
    $validator = (new ValidationBuilder())
        ->array()
        ->children([
            "name" => (new ValidationBuilder())
                ->string()
                ->build()
        ], true)
        ->build();

    if($passesValidation) {
        expect(fn() => $validator->getValidatedValue($input))->not()->toThrow(ValidationException::class);
    } else {
        expect(fn() => $validator->getValidatedValue($input))->toThrow(ValidationException::class);
    }
})->with("additionalFields");
