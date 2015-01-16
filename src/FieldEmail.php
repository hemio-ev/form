<?php

namespace hemio\form;

/**
 * @todo Not extend FieldText
 */
class FieldEmail extends FieldText {

    public function getInputType() {
        return 'email';
    }

    public function inputValidOld() {
        $strAddress = $this->getValueUser($this->getHtmlName());

        $arrExplode = explode('@', $strAddress);
        $arrExplode[] = idn_to_ascii(array_pop($arrExplode));
        $strAddressAscii = implode('@', $arrExplode);

        $blnValid = filter_var($strAddressAscii, FILTER_VALIDATE_EMAIL) !== false;

        return $blnValid;
    }

}
