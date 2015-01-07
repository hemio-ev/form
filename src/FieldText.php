<?php

namespace hemio\form;

use hemio\html;

class FieldText extends Abstract_\FormFieldInSingle {

    use Trait_\SingleInput;

    public function getInputType() {
        return 'text';
    }

    public function __construct($name, $title) {
        $this->init($name, $title, new html\Input($this->getInputType()));
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
    public function allowMultiple($allow) {
        $this->getControlElement()->setAttribute('multiple', (boolean) $allow);
    }

    /**
     * 
     * @param boolean $required
     */
    public function isRequired($required) {
        $this->getControlElement()->setAttribute('required', (boolean) $required);
    }

}
