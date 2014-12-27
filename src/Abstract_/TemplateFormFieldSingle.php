<?php

namespace hemio\form\Abstract_;

/**
 * 
 *
 * @author schnack
 */
abstract class TemplateFormFieldSingle extends Template {

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var \hemio\html\Interface_\FormControl
     */
    protected $control;

    /**
     * 
     * @return \hemio\html\Interface_\FormControl
     */
    public function getControl() {
        return $this->control;
    }

    /**
     * 
     * @param \hemio\html\Interface_\FormControl $field
     * @return \hemio\html\Interface_\FormControl
     */
    public function setField(\hemio\html\Interface_\FormControl $control) {
        $this->control = $control;
        return $control;
    }

}
