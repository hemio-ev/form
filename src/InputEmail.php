<?php

namespace hemio\form;

class InputEmail extends InputText {

    public function inputType() {
        return 'email';
    }

    public function __construct($name) {
        parent::__construct($name);
    }

    public function inputValid() {
        $strAddress = $this->getValueUser($this->getHtmlName());

        $arrExplode = explode('@', $strAddress);
        $arrExplode[] = idn_to_ascii(array_pop($arrExplode));
        $strAddressAscii = implode('@', $arrExplode);

        $blnValid = filter_var($strAddressAscii, FILTER_VALIDATE_EMAIL) !== false;

        return $blnValid;
    }

}
