<?php

namespace hemio\form;

use hemio\html;


/**
 * @deprecated since version 1.0
 * @todo ButtonSubmit?
 */
class InputSelect
        extends Abstract_\FormFieldInSingle {

    public function __construct($name) {
        parent::__construct($name);
        $this->setInputElement(new html\Select());
    }

    public function addOption($strValue, $strContent) {
        $this->getInputElement()[$strValue] = new html\Option($strValue,
                new html\String($strContent));
    }

    public function __toString() {
        if (isset($this->getInputElement()[$this->getValueToUse()])) {
            $this->getInputElement()[$this->getValueToUse()]->setAttribute('selected',
                    true);
        }

        return parent::__toString();
    }

}
