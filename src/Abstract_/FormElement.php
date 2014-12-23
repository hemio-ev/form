<?php

namespace hemio\form\Abstract_;

abstract class FormElement extends \hemio\form\Container {

    protected $name = '';

    /**
     * @return boolean
     */
    abstract public function dataValid();

    /**
     * @return boolean
     */
    abstract public function changed();

    /**
     * 
     * @return Abstract_\Form
     * @throws type
     */
    public function getForm() {
        if ($this->existsInheritableAppendage('_FORM'))
            return $this->getInheritableAppendage('_FORM');
        else {
            print_r(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));

            throw new ToLazy;
        }
    }

}
