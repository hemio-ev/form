<?php

namespace hemio\form;

/**
 * 
 *
 * @todo Unfinished
 */
class FormGet extends Abstract_\Form {

    public function getValueUser($key) {
        return $this->getGet($key);
    }

}
