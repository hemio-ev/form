<?php

namespace hemio\form\template;

use hemio\html;
use hemio\form\Abstract_;

/**
 * 
 *
 */
class FormLineP extends Abstract_\TemplateFormFieldSingle {

    public function __construct() {
        $this['_P'] = new html\P;
        $this['_P']['_LABEL'] = new html\Label();
        $this['_P']['_LABEL']['_SPAN'] = new html\Span();
    }

    public function __toString() {
        return parent::__toString();
    }

    public function init(Abstract_\FormFieldIn $field, html\Interface_\FormControl $control) {
        $this->control = $control;
        $control->setAttribute('name', $field->getHtmlName());
        $control->setAttribute('title', _($field->title));
        $control->setId($field->getHtmlName());

        $this['_P']['_LABEL']['_SPAN'][] = __($field->title);
        $this['_P']['_LABEL']['_INPUT_ELEMENT'] = $control;
    }

}
