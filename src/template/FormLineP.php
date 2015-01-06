<?php

namespace hemio\form\template;

use hemio\html;
use hemio\form\Abstract_;
use hemio\html\Interface_\Submittable;

/**
 * 
 *
 */
class FormLineP extends Abstract_\TemplateFormFieldSingle {

    /**
     *
     * @var Submittable
     */
    public $control;

    /**
     *
     * @var Abstract_\FormFieldIn
     */
    public $field;

    /**
     *
     * @var callable
     */
    protected $postInitHook;

    public function __construct() {
        $this['P'] = new html\P;
        $this['P']['LABEL'] = new html\Label();
        $this->setPostInitHook(function ($this) {
            
        });
    }

    public function setPostInitHook(callable $function) {
        $this->postInitHook = $function;
    }

    public function init(Abstract_\FormFieldIn $field, Submittable $control) {
        $this->field = $field;
        $this->control = $control;

        $this['P']['LABEL']->addChild(__($field->title));
        $this['P']['LABEL']->setAttribute('for', $this->field->getHtmlName());

        $control->setAttribute('name', $field->getHtmlName());
        $control->setAttribute('title', _($field->title));
        $control->setId($field->getHtmlName());
        $this['P']['CONTROL'] = $control;

        $hook = $this->postInitHook;
        $hook($this);
    }

}
