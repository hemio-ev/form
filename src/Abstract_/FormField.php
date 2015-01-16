<?php

namespace hemio\form\Abstract_;

/**
 * Field in a form that expects inputs maybe composed of several input elements.
 */
abstract class FormField extends FormElement {

    /**
     * 
     * @todo not implemented
     */
    public function changed() {
        return false;
    }

    /**
     * 
     */
    public function dataValid() {
        $allValid = true;
        foreach ($this->checks as $key => $check) {
            $valid = $check($this->getValueUser());
            $allValid = $allValid && $valid;
        }

        return $allValid;
    }

    /**
     *
     * @var array[Check]
     */
    public $checks = [];

    /**
     * 
     * @param Check $check
     */
    public function addValidityCheck(\hemio\form\Check $check) {
        $this->checks[$check->getId()] = $check;
    }

}
