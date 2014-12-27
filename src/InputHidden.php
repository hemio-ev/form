<?php

namespace hemio\form;

use hemio\html;

/**
 * @todo Input hidden does not extend FormField but it should. Also name and id is wrong, since not based on form name. Probably we use InputSingle and use template because of lazy form name
 */
class InputHidden extends Abstract_\FormField {

    public function __construct($strName, $strValue) {
        $this['INPUT'] = new html\Input('hidden');

        $this['INPUT']->setAttribute('name', $strName);
        $this['INPUT']->setAttribute('id', $strName);
        $this['INPUT']->setAttribute('type', 'hidden');
        $this['INPUT']->setAttribute('value', $strValue);
    }

    public function changed() {
        return false;
    }

    public function dataValid() {
        return true;
    }

}
