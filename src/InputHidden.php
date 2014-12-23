<?php

namespace hemio\form;
use hemio\html;

class InputHidden extends html\Input {

    public function __construct($strName, $strValue) {
        $this->setAttribute('name', $strName);
        $this->setAttribute('id', $strName);
        $this->setAttribute('type', 'hidden');
        $this->setAttribute('value', $strValue);
    }

}
