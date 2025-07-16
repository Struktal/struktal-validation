<?php

$datatypes = [
    [
        "Hello, World!",
        [ "string", "optionalString" ]
    ],
    [
        "",
        [ "optionalString" ]
    ],
    [
        PHP_EOL,
        [ "string", "optionalString" ]
    ],
    [
        "12345",
        [ "string", "optionalString", "integer", "float" ]
    ],
    [
        "3.1415926",
        [ "string", "optionalString", "integer", "float" ]
    ],
    [
        "mail@domain.com",
        [ "string", "optionalString", "email" ]
    ],
    [
        "dashed-mail@domain.com",
        [ "string", "optionalString", "email" ]
    ],
    [
        "dashed-mail@dashed-domain.com",
        [ "string", "optionalString", "email" ]
    ],
    [
        123,
        [ "integer", "float" ]
    ],
    [
        0,
        [ "optionalString", "integer", "float" ]
    ],
    [
        -123,
        [ "integer", "float" ]
    ],
    [
        PHP_INT_MAX,
        [ "integer", "float" ]
    ],
    [
        PHP_INT_MIN,
        [ "integer", "float" ]
    ],
    [
        3.14,
        [ "integer", "float" ]
    ],
    [
        0.0,
        [ "optionalString", "integer", "float" ]
    ],
    [
        -3.14,
        [ "integer", "float" ]
    ],
    [
        PHP_FLOAT_MAX,
        [ "integer", "float" ]
    ],
    [
        PHP_FLOAT_MIN,
        [ "integer", "float" ]
    ],
    [
        [],
        [ "optionalString", "array" ]
    ],
    [
        [ "Hello", "World" ],
        [ "array" ]
    ],
    [
        [ "Hello", 123, 3.14 ],
        [ "array" ]
    ]
];

dataset("isString", array_map(function(array $value) {
    return [
        $value[0],
        in_array("string", $value[1], true)
    ];
}, $datatypes));
dataset("isOptionalString", array_map(function(array $value) {
    return [
        $value[0],
        in_array("optionalString", $value[1], true)
    ];
}, $datatypes));
dataset("isEmail", array_map(function(array $value) {
    return [
        $value[0],
        in_array("email", $value[1], true)
    ];
}, $datatypes));
dataset("isInteger", array_map(function(array $value) {
    return [
        $value[0],
        in_array("integer", $value[1], true)
    ];
}, $datatypes));
dataset("isFloat", array_map(function(array $value) {
    return [
        $value[0],
        in_array("float", $value[1], true)
    ];
}, $datatypes));
dataset("isArray", array_map(function(array $value) {
    return [
        $value[0],
        in_array("array", $value[1], true)
    ];
}, $datatypes));

$hasChildren = [
    [
        [
            "name" => "John Doe"
        ],
        [ "requiredString", "optionalString", "additionalFields" ]
    ],
    [
        [
            "name" => 20
        ],
        []
    ],
    [
        [
            "age" => 21
        ],
        [ "optionalString" ]
    ],
    [
        [
            "name" => ""
        ],
        [ "optionalString" ]
    ],
    [
        [
            "name" => "John Doe",
            "age" => 20
        ],
        [ "requiredString", "optionalString", "additionalFields" ]
    ],
    [
        [
            "names" => [ "John", "Jane" ]
        ],
        [ "optionalString" ]
    ],
    [
        [
            "details" => [
                "name" => "John Doe",
                "age" => 30
            ]
        ],
        [ "optionalString", "nestedArray" ]
    ],
    [
        [
            "details" => [
                "age" => 30
            ]
        ],
        [ "optionalString" ]
    ],
    [
        [
            "details" => [
                "name" => "",
                "age" => 30
            ]
        ],
        [ "optionalString" ]
    ]
];

dataset("requiredString", array_map(function(array $value) {
    return [
        $value[0],
        in_array("requiredString", $value[1], true)
    ];
}, $hasChildren));
dataset("optionalString", array_map(function(array $value) {
    return [
        $value[0],
        in_array("optionalString", $value[1], true)
    ];
}, $hasChildren));
dataset("nestedArray", array_map(function(array $value) {
    return [
        $value[0],
        in_array("nestedArray", $value[1], true)
    ];
}, $hasChildren));
dataset("additionalFields", array_map(function(array $value) {
    return [
        $value[0],
        in_array("additionalFields", $value[1], true)
    ];
}, $hasChildren));

$valueRestrictions = [
    [
        10,
        [ "maxVal10", "minVal0", "maxVal10MinVal0" ]
    ],
    [
        20,
        [ "minVal0" ]
    ],
    [
        -10,
        [ "maxVal10" ]
    ],
    [
        "Hello",
        [ "maxLen10", "minLen5", "maxLen10MinLen5" ]
    ],
    [
        "Hello, World!",
        [ "minLen5" ]
    ],
    [
        "Hi",
        [ "maxLen10" ]
    ]
];

dataset("maxVal10", array_map(function(array $value) {
    return [
        $value[0],
        in_array("maxVal10", $value[1], true)
    ];
}, $valueRestrictions));
dataset("minVal0", array_map(function(array $value) {
    return [
        $value[0],
        in_array("minVal0", $value[1], true)
    ];
}, $valueRestrictions));
dataset("maxVal10MinVal0", array_map(function(array $value) {
    return [
        $value[0],
        in_array("maxVal10MinVal0", $value[1], true)
    ];
}, $valueRestrictions));
dataset("maxLen10", array_map(function(array $value) {
    return [
        $value[0],
        in_array("maxLen10", $value[1], true)
    ];
}, $valueRestrictions));
dataset("minLen5", array_map(function(array $value) {
    return [
        $value[0],
        in_array("minLen5", $value[1], true)
    ];
}, $valueRestrictions));
dataset("maxLen10MinLen5", array_map(function(array $value) {
    return [
        $value[0],
        in_array("maxLen10MinLen5", $value[1], true)
    ];
}, $valueRestrictions));
