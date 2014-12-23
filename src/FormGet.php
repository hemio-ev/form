<?php

namespace hemio\form;

/**
 * 
 *
 * @author schnack
 */
class FormGet extends Abstract_\Form {
    public function getValueUser($key) {
        return $this->getGet($key);
    }
}
