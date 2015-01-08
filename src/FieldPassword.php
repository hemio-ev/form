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

    public function getValueUser() {
        return '';
    }

}
