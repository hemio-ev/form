<?php

namespace hemio\form;

use hemio\html;

class InputTextarea
        extends Abstract_\InputSingle {

    public $strPlaceholder;

    public function inputType() {
        return 'text';
    }

    public function __construct($name) {
        parent::__construct($name);
        $this->init(new html\Textarea($this->inputType()));
    }

    public function __toString() {
        $this->getInputElement()[] = new html\String($this->getValueToUse());
        $this->getInputElement()->setAttribute('placeholder',
                $this->strPlaceholder);

        return parent::__toString();
    }

}
