<?php

namespace hemio\form;

/**
 * @todo Not extend FieldText
 */
class FieldEmail extends FieldText {

    public function getInputType() {
        return 'email';
    }

    public function __construct($name, $title = null) {
        if ($title === null)
            $title = _('Email Address');

        $this->init($name, $title, new \hemio\html\Input($this->getInputType()));
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
