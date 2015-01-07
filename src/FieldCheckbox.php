<?php

namespace hemio\form;

use hemio\html;

class FieldCheckbox extends Abstract_\FormFieldInSingle {

    use Trait_\SingleInput;

    public function getInputType() {
        return 'checkbox';
    }

    public function __construct($name, $title) {
        $this->init($name, $title, new html\Input($this->getInputType()));
    }

}
