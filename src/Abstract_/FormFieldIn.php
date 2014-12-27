<?php

namespace hemio\form\Abstract_;

/**
 * Field in a form that expects inputs maybe composed of several input elements.
 */
abstract class FormFieldIn extends FormField {

    public function getName() {
        return $this->name;
    }

    public function getHtmlName(array $extraKeys = []) {
        return $this->getForm()->getName() .
                '_' . implode('_', $extraKeys) .
                '_' . $this->getName();
    }

    /**
     * 
     * @todo not implemented
     */
    public function changed() {
        return false;
    }

    /**
     * 
     * @todo not implemented
     */
    public function dataValid() {
        return true;
    }

}
