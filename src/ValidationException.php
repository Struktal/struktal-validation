<?php

namespace struktal\validation;

class ValidationException extends \Exception {

    public function __construct($message = PHP_EOL) {
        parent::__construct($message);
    }
}
