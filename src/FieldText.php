<?php

namespace hemio\form;

class FieldText extends Abstract_\FormFieldInput {

    public function getInputType() {
        return 'text';
    }

    /**
     *
     * @param string $placeholder
     */
    public function setPlaceholder($placeholder) {
        $this->getControlElement()->setAttribute('placeholder', $placeholder);
    }

    /**
     *
     * @param boolean $allow
     */
    public function setAllowMultiple($allow = true) {
        $this->getControlElement()->setAttribute('multiple', (boolean) $allow);
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

    public function setPattern($pattern, $message = null) {
        $this->addValidityCheck(new CheckPattern('pattern', $pattern, $message));
        $this->getControlElement()->setAttribute('pattern', $pattern);
        if ($message !== null)
            $this->getControlElement()->setAttribute('title', $message);
    }

}
