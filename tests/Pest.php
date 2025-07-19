<?php

require_once(__DIR__ . "/ValidationErrorMessages.php");

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

$errorMessagesTests = [
    [
        "Hello",
        [
            "noEmail" => ValidationErrorMessages::INVALID_EMAIL->name,
            "noInteger" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noFloat" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noArray" => ValidationErrorMessages::INVALID_ARRAY->name,
            "noIntWithMaxVal10" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noIntWithMinVal0" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noIntWithMaxVal10MinVal0" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noFloatWithMaxVal10" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noFloatWithMinVal0" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noFloatWithMaxVal10MinVal0" => ValidationErrorMessages::INVALID_FLOAT->name
        ]
    ],
    [
        "Hello, World!",
        [
            "noEmail" => ValidationErrorMessages::INVALID_EMAIL->name,
            "noInteger" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noFloat" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noArray" => ValidationErrorMessages::INVALID_ARRAY->name,
            "noIntWithMaxVal10" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noIntWithMinVal0" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noIntWithMaxVal10MinVal0" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noFloatWithMaxVal10" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noFloatWithMinVal0" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noFloatWithMaxVal10MinVal0" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noStringWithMaxLen10" => ValidationErrorMessages::MAX_LEN_EXCEEDED->name,
            "noStringWithMaxLen10MinLen5" => ValidationErrorMessages::MAX_LEN_EXCEEDED->name
        ]
    ],
    [
        "mail@domain.com",
        [
            "noInteger" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noFloat" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noArray" => ValidationErrorMessages::INVALID_ARRAY->name,
            "noIntWithMaxVal10" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noIntWithMinVal0" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noIntWithMaxVal10MinVal0" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noFloatWithMaxVal10" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noFloatWithMinVal0" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noFloatWithMaxVal10MinVal0" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noStringWithMaxLen10" => ValidationErrorMessages::MAX_LEN_EXCEEDED->name,
            "noStringWithMaxLen10MinLen5" => ValidationErrorMessages::MAX_LEN_EXCEEDED->name
        ]
    ],
    [
        5,
        [
            "noString" => ValidationErrorMessages::INVALID_STRING->name,
            "noEmail" => ValidationErrorMessages::INVALID_EMAIL->name,
//            "noFloat" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noArray" => ValidationErrorMessages::INVALID_ARRAY->name,
//            "noFloatWithMaxVal10" => ValidationErrorMessages::INVALID_FLOAT->name,
//            "noFloatWithMinVal0" => ValidationErrorMessages::INVALID_FLOAT->name,
//            "noFloatWithMaxVal10MinVal0" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noStringWithMaxLen10" => ValidationErrorMessages::INVALID_STRING->name,
            "noStringWithMinLen5" => ValidationErrorMessages::INVALID_STRING->name,
            "noStringWithMaxLen10MinLen5" => ValidationErrorMessages::INVALID_STRING->name,
        ]
    ],
    [
        42,
        [
            "noString" => ValidationErrorMessages::INVALID_STRING->name,
            "noEmail" => ValidationErrorMessages::INVALID_EMAIL->name,
//            "noFloat" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noArray" => ValidationErrorMessages::INVALID_ARRAY->name,
            "noIntWithMaxVal10" => ValidationErrorMessages::MAX_VAL_EXCEEDED->name,
            "noIntWithMaxVal10MinVal0" => ValidationErrorMessages::MAX_VAL_EXCEEDED->name,
//            "noFloatWithMaxVal10" => ValidationErrorMessages::INVALID_FLOAT->name,
//            "noFloatWithMinVal0" => ValidationErrorMessages::INVALID_FLOAT->name,
//            "noFloatWithMaxVal10MinVal0" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noStringWithMaxLen10" => ValidationErrorMessages::INVALID_STRING->name,
            "noStringWithMinLen5" => ValidationErrorMessages::INVALID_STRING->name,
            "noStringWithMaxLen10MinLen5" => ValidationErrorMessages::INVALID_STRING->name
        ]
    ],
    [
        -5,
        [
            "noString" => ValidationErrorMessages::INVALID_STRING->name,
            "noEmail" => ValidationErrorMessages::INVALID_EMAIL->name,
//            "noFloat" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noArray" => ValidationErrorMessages::INVALID_ARRAY->name,
            "noIntWithMinVal0" => ValidationErrorMessages::MIN_VAL_NOT_REACHED->name,
            "noIntWithMaxVal10MinVal0" => ValidationErrorMessages::MIN_VAL_NOT_REACHED->name,
//            "noFloatWithMaxVal10" => ValidationErrorMessages::INVALID_FLOAT->name,
//            "noFloatWithMinVal0" => ValidationErrorMessages::INVALID_FLOAT->name,
//            "noFloatWithMaxVal10MinVal0" => ValidationErrorMessages::INVALID_FLOAT->name,
            "noStringWithMaxLen10" => ValidationErrorMessages::INVALID_STRING->name,
            "noStringWithMinLen5" => ValidationErrorMessages::INVALID_STRING->name,
            "noStringWithMaxLen10MinLen5" => ValidationErrorMessages::INVALID_STRING->name
        ]
    ],
    [
        pi(),
        [
            "noString" => ValidationErrorMessages::INVALID_STRING->name,
            "noEmail" => ValidationErrorMessages::INVALID_EMAIL->name,
//            "noInteger" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noArray" => ValidationErrorMessages::INVALID_ARRAY->name,
//            "noIntWithMaxVal10" => ValidationErrorMessages::INVALID_INTEGER->name,
//            "noIntWithMinVal0" => ValidationErrorMessages::INVALID_INTEGER->name,
//            "noIntWithMaxVal10MinVal0" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noStringWithMaxLen10" => ValidationErrorMessages::INVALID_STRING->name,
            "noStringWithMinLen5" => ValidationErrorMessages::INVALID_STRING->name,
            "noStringWithMaxLen10MinLen5" => ValidationErrorMessages::INVALID_STRING->name
        ]
    ],
    [
        -pi(),
        [
            "noString" => ValidationErrorMessages::INVALID_STRING->name,
            "noEmail" => ValidationErrorMessages::INVALID_EMAIL->name,
//            "noInteger" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noArray" => ValidationErrorMessages::INVALID_ARRAY->name,
//            "noIntWithMaxVal10" => ValidationErrorMessages::INVALID_INTEGER->name,
//            "noIntWithMinVal0" => ValidationErrorMessages::INVALID_INTEGER->name,
//            "noIntWithMaxVal10MinVal0" => ValidationErrorMessages::INVALID_INTEGER->name,
            "noFloatWithMinVal0" => ValidationErrorMessages::MIN_VAL_NOT_REACHED->name,
            "noFloatWithMaxVal10MinVal0" => ValidationErrorMessages::MIN_VAL_NOT_REACHED->name,
            "noStringWithMaxLen10" => ValidationErrorMessages::INVALID_STRING->name,
            "noStringWithMinLen5" => ValidationErrorMessages::INVALID_STRING->name,
            "noStringWithMaxLen10MinLen5" => ValidationErrorMessages::INVALID_STRING->name
        ]
    ]
];

dataset("emNoString", array_map(function(array $value) {
    return [
        $value[0],
        $value[1]["noString"] ?? null
    ];
}, $errorMessagesTests));
dataset("emNoEmail", array_map(function(array $value) {
    return [
        $value[0],
        $value[1]["noEmail"] ?? null
    ];
}, $errorMessagesTests));
dataset("emNoInteger", array_map(function(array $value) {
    return [
        $value[0],
        $value[1]["noInteger"] ?? null
    ];
}, $errorMessagesTests));
dataset("emNoFloat", array_map(function(array $value) {
    return [
        $value[0],
        $value[1]["noFloat"] ?? null
    ];
}, $errorMessagesTests));
dataset("emNoArray", array_map(function(array $value) {
    return [
        $value[0],
        $value[1]["noArray"] ?? null
    ];
}, $errorMessagesTests));
dataset("emnoIntWithMaxVal10", array_map(function(array $value) {
    return [
        $value[0],
        $value[1]["noIntWithMaxVal10"] ?? null
    ];
}, $errorMessagesTests));
dataset("emnoIntWithMinVal0", array_map(function(array $value) {
    return [
        $value[0],
        $value[1]["noIntWithMinVal0"] ?? null
    ];
}, $errorMessagesTests));
dataset("emnoIntWithMaxVal10MinVal0", array_map(function(array $value) {
    return [
        $value[0],
        $value[1]["noIntWithMaxVal10MinVal0"] ?? null
    ];
}, $errorMessagesTests));
dataset("emNoStringWithMaxLen10", array_map(function(array $value) {
    return [
        $value[0],
        $value[1]["noStringWithMaxLen10"] ?? null
    ];
}, $errorMessagesTests));
dataset("emNoStringWithMinLen5", array_map(function(array $value) {
    return [
        $value[0],
        $value[1]["noStringWithMinLen5"] ?? null
    ];
}, $errorMessagesTests));
dataset("emNoStringWithMaxLen10MinLen5", array_map(function(array $value) {
    return [
        $value[0],
        $value[1]["noStringWithMaxLen10MinLen5"] ?? null
    ];
}, $errorMessagesTests));
