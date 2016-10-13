<?php

namespace hemio\form\Trait_;

trait MaintainsTransformations {

    /**
     *
     * @var array
     */
    protected $valueTransformations = [];

    /**
     * 
     * @param mixed $id
     * @param callable $transformation
     */
    public function setValueTransformation($id, callable $transformation) {
        $this->valueTransformations[$id] = $transformation;
    }

    /**
     * Returns the given value with all transformations applied
     * 
     * @param mixed $value
     */
    public function withTransformations($value) {
        // null for not provided remains untouched
        if ($value === null)
            return null;

        foreach ($this->valueTransformations as $f)
            $value = $f($value);

        return $value;
    }

}
