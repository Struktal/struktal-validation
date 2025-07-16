<?php

use \struktal\validation\ValidationBuilder;
use \struktal\validation\ValidationException;

test("Required string child", function(mixed $input, bool $passesValidation) {
    $validator = ValidationBuilder::create()
        ->array()
        ->children([
            "name" => ValidationBuilder::create()
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
    $validator = ValidationBuilder::create()
        ->array()
        ->children([
            "name" => ValidationBuilder::create()
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
    $validator = ValidationBuilder::create()
        ->array()
        ->children([
            "details" => ValidationBuilder::create()
                ->array()
                ->children([
                    "name" => ValidationBuilder::create()
                        ->string()
                        ->build(),
                    "age" => ValidationBuilder::create()
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
    $validator = ValidationBuilder::create()
        ->array()
        ->children([
            "name" => ValidationBuilder::create()
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
