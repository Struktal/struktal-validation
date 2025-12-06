<?php

namespace struktal\validation\validators;

use struktal\ORM\GenericEntity;
use struktal\ORM\GenericEntityDAO;
use struktal\validation\internals\GenericValidator;
use struktal\validation\internals\ValidatorInterface;

class IsInDatabase extends GenericValidator implements ValidatorInterface {
    private GenericEntityDAO $dao;
    private array $additionalFilters;

    public function __construct(GenericEntityDAO $dao, array $additionalFilters = []) {
        $this->dao = $dao;
        $this->additionalFilters = $additionalFilters;
    }

    public static function create(?GenericEntityDAO $dao = null, array $additionalFilters = []): ValidatorInterface {
        if($dao === null) {
            $dao = GenericEntity::dao();
        }

        return new self($dao, $additionalFilters);
    }

    public function getValidatedValue(mixed &$input): mixed {
        if(!is_numeric($input)) {
            return null;
        }

        $objectId = intval($input);

        $filters = $this->additionalFilters;
        $filters["id"] = $objectId;

        $object = $this->dao->getObject($filters);
        if(!$object instanceof GenericEntity) {
            parent::failValidation();
        }

        return $object;
    }
}
