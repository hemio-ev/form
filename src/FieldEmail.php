<?php

namespace hemio\form;

/**
 * @todo Not extend FieldText
 */
class FieldEmail extends FieldText
{

    public function getInputType()
    {
        return 'email';
    }

    public function __construct($name, $title)
    {
        parent::__construct($name, $title);
        $this->addValidityCheck(new CheckEmail);
    }
}
