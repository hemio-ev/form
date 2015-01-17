<?php

namespace hemio\form;

/**
 * @todo Not extend FieldText
 */
class FieldEmail extends FieldText {

    public function getInputType() {
        return 'text';
    }

    public function __construct($name, $title) {
        parent::__construct($name, $title);
        $this->addValidityCheck(new CheckEmail);
    }

}
