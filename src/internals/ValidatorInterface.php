<?php

namespace struktal\validation\internals;

use struktal\validation\ValidationException;

interface ValidatorInterface {
    public static function create();

    /**
     * @throws ValidationException
     */
    public function getValidatedValue(mixed &$input): mixed;
}
