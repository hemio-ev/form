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
     * @var \hemio\html\Interface_\Submittable
     */
    protected $control;

    /**
     * 
     * @return \hemio\html\Interface_\Submittable
     */
    public function getControl() {
        return $this->control;
    }

    /**
     * 
     * @param \hemio\html\Interface_\Submittable $control
     * @return \hemio\html\Interface_\Submittable
     */
    public function setField(\hemio\html\Interface_\Submittable $control) {
        $this->control = $control;
        return $control;
    }

}
