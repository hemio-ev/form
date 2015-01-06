<?php

namespace hemio\form;

use hemio\html;

class FieldTextarea extends Abstract_\FormFieldInSingle {

    use \hemio\form\Trait_\FormElementSingle;

    public function inputType() {
        return 'text';
    }

    public function __construct($name, $title) {
        $this->init($name, $title, new html\Textarea($this->inputType()));
    }

    /**
     * 
     * @return \hemio\form\Abstract_\TemplateFormFieldSingle
     */
    public function fill() {
        $template = $this->getSingleTemplateClone('TEXTAREA');

        $this['_TEMPLATE'] = $template;
        $template->init($this, $this->control);

        $this->filled = true;

        return $template;
    }

    public function __toString() {
        $this->fill();

        return parent::__toString();
    }

}
