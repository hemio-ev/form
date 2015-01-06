<?php

namespace hemio\form\Trait_;

use hemio\form\exception;
use hemio\form;

/**
 * Gives everything for the typical case, that the form element consists of
 * only one input/select/... field enbedded
 */
trait FormElementSingle {

    /**
     * Paragraph cotaining the label
     * @var html\P
     */
    protected $paragraph;

    /**
     * Element something like Input/Select/...
     * @var html\Interface_\Submittable
     */
    protected $control;

    /**
     *
     * @var boolean
     */
    protected $filled = false;

    /**
     * 
     * @return \hemio\form\Abstract_\TemplateFormFieldSingle
     * @throws exception\NotLazyEnough
     * @throws exception\AppendageTypeError
     */
    public function getSingleTemplateClone($special = null) {
        
        $appendageName = form\FormPost::SINGLE_CONTROL_TEMPLATE . '_' . $special;

        if ($this->getInheritableAppendage($appendageName) === null) {
            $appendageName = form\FormPost::SINGLE_CONTROL_TEMPLATE;
        }

        $template = $this->getInheritableAppendage($appendageName);

        if ($template instanceof \hemio\form\Abstract_\TemplateFormFieldSingle) {
            return clone $template;
        } elseif ($template === null) {
            throw new exception\NotLazyEnough(
            sprintf('There is no "%s" available for this Input', $appendageName));
        } else {
            throw new exception\AppendageTypeError(
            sprintf('Not an istance of TemplateFormFieldSingle "%s"', $appendageName));
        }
    }

}
