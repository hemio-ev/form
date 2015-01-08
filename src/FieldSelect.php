<?php

namespace hemio\form;

use hemio\html;

/**
 *
 * @since 1.0 
 */
class FieldSelect extends Abstract_\FormFieldDefault {

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
     * @return \hemio\form\Abstract_\TemplateFormField
     */
    public function fill() {
        $template = $this->getFieldTemplateClone('SELECT');

        $this['_TEMPLATE'] = $template;
        $template->init($this, $this->control);

        $this->filled = true;

        return $template;
    }

    public function addOption($value, $content) {
        $this->getControlElement()->addChild(new html\Option($value, new html\String($content)));
    }

}
