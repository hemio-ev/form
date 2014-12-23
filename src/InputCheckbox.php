<?php

namespace hemio\form;

use hemio\html;

class InputCheckbox
        extends Abstract_\InputSingle {

    public $strPlaceholder;

    public function inputType() {
        return 'checkbox';
    }

    public function __construct($name) {
        parent::__construct($name);
        $this->addInheritableAppendage('_INPUT_SINGLE_TEMPLATE',
                new Template_FormLineCheckbox());
        $this->init(new html\Input($this->inputType()));
    }

    public function __toString() {
        $this->getInputElement()->setAttribute('value', $this->getValueToUse());
        $this->getInputElement()->setAttribute('placeholder',
                $this->strPlaceholder);

        return parent::__toString();
    }

}
