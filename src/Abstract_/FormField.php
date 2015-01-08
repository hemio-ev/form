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
     * @todo not implemented
     */
    public function dataValid() {
        return true;
    }

}
