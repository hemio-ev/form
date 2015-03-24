<?php

namespace hemio\form;

/**
 * @todo Not extend FieldText
 */
class FieldTel extends FieldText
{

    public function getInputType()
    {
        return 'tel';
    }

    public function __construct($name, $title)
    {
        parent::__construct($name, $title);
        $this->addValidityCheck(new CheckTel);
    }
}
