<?php

namespace hemio\form;

class FieldRadio extends FieldCheckbox
{

    public function getInputType()
    {
        return 'radio';
    }

    public function fill()
    {
        $fill = parent::fill();

        $this->control->setAttribute('value', $this->idSuffix);
        if ($this->idSuffix === $this->getValueToUse())
            $this->control->setAttribute('checked', true);

        return $fill;
    }
}
