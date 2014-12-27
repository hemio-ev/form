<?php

namespace hemio\form;
use hemio\html;

class InputPassword extends Abstract_\FormFieldInSingle {

    public function __construct($name) {
        parent::__construct($name);
        $this->setInputElement(new html\Input('password'));
    }

    // force the value atribute to null to prevent resending the password to clients
    public function getValueStored() {
        return '';
    }

    public function getHtmlValue() {
        return '';
    }

    public function blnDataValid() {
        if ($this->clsCheckPasswordOk != null) {
            $clsCheckFunction = $this->clsCheckPasswordOk;
            $arrCheck = $clsCheckFunction($this->strGetPassword());
            if (!$arrCheck['result']) {
                $this->addError($arrCheck['msg']);
                return false;
            }
        }

        return true;
    }

    public function setCheckPasswordOkClosure(\Closure $clsCheckPassword) {
        $this->clsCheckPasswordOk = $clsCheckPassword;
    }

}
