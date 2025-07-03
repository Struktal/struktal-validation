<?php

namespace struktal\validation;

interface ValidatorInterface {
    public static function create();

    /**
     * @throws ValidationException
     */
    public function getValidatedValue(mixed &$input): mixed;
}
