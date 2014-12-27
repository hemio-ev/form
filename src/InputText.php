<?php

namespace hemio\form;

use hemio\html;

class InputText extends Abstract_\FormFieldInSingle {

    use Trait_\SingleInput;

    public function __construct($name, $title) {
        $this->name = $name;
        $this->title = $title;
    }

    public function fill() {
        $this->init(new html\Input('text'));
    }

    /**
     * @todo how generic is a placeholder?
     * @param string $placeholder
     */
    public function setPlaceholder($placeholder) {
        $this->getInputElement()->setAttribute('placeholder', $placeholder);
    }

    /**
     * 
     * @todo value cannot be solved in template? it dependes on the inputElement :(
     * Maybe we can handle this via pudding the fill() to this class
     * 
     * 
     * @return string
     */
    public function __toString() {
        $this->fill();

        $this['_TEMPLATE']->getControl()->setAttribute('value', $this->getValueToUse());

        return parent::__toString();
    }

    public function getInputType() {
        return 'text';
    }

}
