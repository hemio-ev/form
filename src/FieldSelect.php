<?php

namespace hemio\form;

use hemio\html;
use \RecursiveIteratorIterator as RecursIter;

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
        foreach (new RecursIter($this->getControlElement(), RecursIter::SELF_FIRST) as $option)
            if (
                    $option instanceof html\Option &&
                    $option->getAttribute('value') == $this->getValueToUse()
            )
                $option->setAttribute('selected', true);

        $template = $this->getFieldTemplateClone('SELECT');

        $this['_TEMPLATE'] = $template;
        $template->init($this, $this->control);

        $this->filled = true;

        return $template;
    }

    /**
     * 
     * @param mixed $value
     * @param mixed $content
     * @return html\Option
     */
    public function addOption($value, $content = null) {
        if ($content === null)
            $content = $value;

        $option = new html\Option($value, new html\Str($content));
        $this->getControlElement()->addChild($option);

        return $option;
    }

}
