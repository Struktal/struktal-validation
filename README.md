# Struktal-Validation

This is a PHP library for validating user inputs through APIs or forms.

## Installation

To install this library, include it in your project using Composer:

```bash
composer require struktal/validation
```

## Usage

### Basic validation

To validate a variable against a set of rules, you can best use the `ValidationBuilder` class:

```php
use struktal\validation\ValidationBuilder;
use struktal\validation\ValidationException;

$userInput = $_POST["input"];

// Create a validation builder instance and define your validation rules
$validator = ValidationBuilder::create()
    ->withErrorMessage("Input is missing")
    ->string()
    ->withErrorMessage("Input must be a string")
    ->minLength(5)
    ->withErrorMessage("Input must be at least 5 characters long")
    ->maxLength(10)
    ->withErrorMessage("Input must be at most 10 characters long")
    ->build();

// Validate the variable
try {
    $validatedData = $validator->getValidatedValue($userInput);
} catch(ValidationException $e) {
    // Handle validation errors
    echo "Validation failed: " . $e->getMessage();
}

// Do something with the validated data
```

### Array validation

You can also validate arrays in a similar way:

```php
use struktal\validation\ValidationBuilder;
use struktal\validation\ValidationException;

$userInput = $_POST;

$validator = ValidationBuilder::create()
    ->withErrorMessage("No POST data provided")
    ->array()
    ->children([
        "input" => ValidationBuilder::create()
            ->withErrorMessage("Input is missing")
            ->string()
            ->build(), // More rules could apply, also with explicit error messages
        "moreInput" => ValidationBuilder::create()
            ->withErrorMessage("More input is missing")
            ->int()
            ->minValue(0)
            ->maxValue(10)
            ->build(),
    ])
    ->withErrorMessage("Invalid POST data")
    ->build();

try {
    $validatedData = $validator->getValidatedValue($userInput);
} catch(ValidationException $e) {
    // Handle validation errors
    echo "Validation failed: " . $e->getMessage();
}

// Do something with the validated data
```

### Database validation

If you use [Struktal/struktal-orm](https://github.com/Struktal/struktal-orm), you can also check whether an object exists in the database.
Use the `inDatabase()` method to validate that the user has provided a valid object ID.
The method takes a `GenericObjectDAO` object, as well as an optional array for additional filter options as parameters.

## Dependencies

This library uses the following dependencies:

- **ext-pdo**
- **struktal-orm** - GitHub: [Struktal/struktal-orm](https://github.com/Struktal/struktal-orm), licensed under [MIT license](https://github.com/Struktal/struktal-orm/blob/main/LICENSE)
- **pest** - GitHub: [pestphp/pest](https://github.com/pestphp/pest), licensed under [MIT license](https://github.com/pestphp/pest/blob/3.x/LICENSE.md)

## License

This software is licensed under the MIT license. See the [LICENSE](./LICENSE) file for more information.
