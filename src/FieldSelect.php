<?php

namespace hemio\form;

use hemio\html;

/**
 * @deprecated since version 1.0
 * @todo ButtonSubmit?
 */
class FieldSelect extends Abstract_\FormFieldInSingle {

    use Trait_\FormElementSingle;

    /**
     * 
     * 
     * @var hemio\html\Select
     */
    protected $controlElement;

    /**
     *
     * @var boolean
     */
    protected $filled = false;

    public function __construct($name, $title) {
        $this->init($name, $title, new html\Select);
    }

    /**
     * 
     * @return html\Select
     */
    public function getControlElement() {
        return $this->control;
    }

    /**
     * 
     * @return \hemio\form\Abstract_\TemplateFormFieldSingle
     */
    public function fill() {
        $template = $this->getSingleTemplateClone('SELECT');

        $this['_TEMPLATE'] = $template;
        $template->init($this, $this->control);

        $this->filled = true;

        return $template;
    }

    public function addOption($value, $content) {
        $this->getControlElement()->addChild(new html\Option($value, new html\String($content)));
    }

    public function __toString() {
        #  if (isset($this->getInputElement()[$this->getValueToUse()])) {
        #      $this->getInputElement()[$this->getValueToUse()]->setAttribute('selected',
        #              true);
        #  }

        if (!$this->filled)
            $this->fill();

        return parent::__toString();
    }

}
