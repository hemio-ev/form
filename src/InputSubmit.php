<?php

namespace hemio\form;

use hemio\html;

class InputSubmit extends Abstract_\InputSingle {

    public function __construct($name) {
        parent::__construct($name);
        $this->init(new html\Button('submit'));
        $this->getInputElement()->addChild(new L10nStr($this->getName()));
    }

    public function valids() {
        return true;
    }

}
