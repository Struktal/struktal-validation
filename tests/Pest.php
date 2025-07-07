<?php

$datatypes = [
    [
        "Hello, World!",
        [ "string" ]
    ],
    [
        "",
        [ "string" ]
    ],
    [
        PHP_EOL,
        [ "string" ]
    ],
    [
        "12345",
        [ "string", "integer", "float" ]
    ],
    [
        "3.1415926",
        [ "string", "integer", "float" ]
    ],
    [
        "mail@domain.com",
        [ "string", "email" ]
    ],
    [
        "dashed-mail@domain.com",
        [ "string", "email" ]
    ],
    [
        "dashed-mail@dashed-domain.com",
        [ "string", "email" ]
    ],
    [
        123,
        [ "integer", "float" ]
    ],
    [
        0,
        [ "integer", "float" ]
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
        [ "integer", "float" ]
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
        [ "array" ]
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
