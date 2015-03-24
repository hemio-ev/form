<?php

namespace hemio\form;

/**
 *
 *
 */
class FormGet extends Abstract_\Form
{

    public function getValueUser($key)
    {
        return $this->getGet($key);
    }
}
