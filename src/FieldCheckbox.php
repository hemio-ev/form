<?php

namespace hemio\form;

use hemio\html;

class FieldCheckbox extends Abstract_\FormFieldInput {

    public function getInputType() {
        return 'checkbox';
    }

    /**
     * 
     * @param boolean $required
     */
    public function setRequired($required = true) {
        $this->addValidityCheck(new CheckMinLength(1));
        $this->required = $required;
        $this->getControlElement()->setAttribute('required', (boolean) $required);
    }

}
