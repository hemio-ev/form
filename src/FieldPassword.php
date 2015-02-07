<?php

namespace hemio\form;

class FieldPassword extends Abstract_\FormFieldInput {

    public function getInputType() {
        return 'password';
    }

    // force the value atribute to null to prevent resending the password to clients
    public function getValueStored() {
        return '';
    }

    public function getValueToUse() {
        return '';
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
