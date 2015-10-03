<?php

namespace hemio\form;

use hemio\html;

class FieldTextarea extends Abstract_\FormFieldDefault
{

    public function __construct($name, $title)
    {
        $this->init($name, $title, new html\Textarea($this->inputType()));
    }

    /**
     *
     * @return \hemio\form\Abstract_\TemplateFormField
     */
    public function fill()
    {
        $template = $this->getFieldTemplateClone('TEXTAREA');

        $this['_TEMPLATE'] = $template;
        $template->init($this, $this->control);
        $this->control->addChild(new html\Str($this->getValueToUse()));

        $this->filled = true;

        return $template;
    }

    public function describe()
    {
        return 'INPUT(TEXTAREA)';
    }

    /**
     *
     * @param boolean $required
     */
    public function setRequired($required = true)
    {
        $this->addValidityCheck(new CheckMinLength(1));
        $this->required = $required;
        $this->control->setAttribute('required', (boolean) $required);
    }
}
