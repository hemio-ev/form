<?php

namespace hemio\form;

use hemio\html;

/**
 *
 */
class InputHidden extends Abstract_\FormElement
{

    public function __construct($name, $value)
    {
        $this->name = $name;

        $this['INPUT'] = new html\Input('hidden');
        $this['INPUT']->setAttribute('value', $value);
    }

    public function dataValid()
    {
        return true;
    }

    public function __toString()
    {
        $this['INPUT']->setAttribute('name', $this->getHtmlName());
        $this['INPUT']->setAttribute('id', $this->getHtmlName());

        return parent::__toString();
    }
}
