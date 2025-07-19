<?php

enum ValidationErrorMessages {
    case INVALID_STRING;
    case INVALID_EMAIL;
    case INVALID_INTEGER;
    case INVALID_FLOAT;
    case INVALID_ARRAY;

    case MAX_VAL_EXCEEDED;
    case MIN_VAL_NOT_REACHED;
    case MAX_LEN_EXCEEDED;
    case MIN_LEN_NOT_REACHED;
}
