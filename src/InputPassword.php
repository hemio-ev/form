<?php

namespace hemio\form;

use hemio\html;

class InputPassword extends Abstract_\FormFieldInSingle {

    use Trait_\SingleInput;

    public function getInputType() {
        return 'password';
    }

    public function __construct($name, $title = null) {
        if ($title === null)
            $title = _('Password');

        $this->init($name, $title, new html\Input($this->getInputType()));
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

    /**
     * 
     * @return string
     */
    public function __toString() {
        if (!$this->filled)
            $this->fill();

        return parent::__toString();
    }

}
