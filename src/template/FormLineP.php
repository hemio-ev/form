<?php

namespace hemio\form\template;

use hemio\html;
use hemio\form\Abstract_;
use hemio\html\Interface_\Submittable;

/**
 * 
 *
 */
class FormLineP extends Abstract_\TemplateFormField {

    public function __construct() {
        $this['P'] = new html\P;
        $this['P']['LABEL'] = new html\Label();
        $this->setPostInitHook(function ($template) {
            
        });
    }

    public function setPostInitHook(callable $function) {
        $this->postInitHook = $function;
    }

    public function init(Abstract_\FormField $field, Submittable $control) {
        $this->setField($field);
        $this->setControl($control);

        $this['P']['LABEL']->addChild(__($field->title));
        $this['P']['LABEL']->setAttribute('for', $this->field->getHtmlName());

        $control->setAttribute('name', $field->getHtmlName());
        $control->setId($field->getHtmlName());
        $this['P']['CONTROL'] = $control;

        $hook = $this->postInitHook;
        $hook($this);
    }

}
