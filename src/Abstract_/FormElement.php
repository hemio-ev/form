<?php

namespace hemio\form\Abstract_;

use hemio\form\exception;

/**
 * 
 */
abstract class FormElement extends \hemio\form\Container {

    protected $name = '';

    /**
     * Is active value in the form correct.
     * 
     * @return boolean
     */
    abstract public function dataValid();

    /**
     * Has the value changed with respective to the stored or default value.
     * @return boolean
     */
    abstract public function changed();

    /**
     * Get the form to which this element belongs
     * 
     * @return Abstract_\Form
     * @throws exception\NotLazyEnough
     */
    public function getForm() {
        if ($this->existsInheritableAppendage('_FORM'))
            return $this->getInheritableAppendage('_FORM');
        else {
            #print_r(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));

            throw new exception\NotLazyEnough(
            'No Form for FormElement found. Maybe not yet a child of a Form.');
        }
    }

    /**
     * 
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * 
     * @param array $extraKeys
     * @return string
     */
    public function getHtmlName(array $extraKeys = []) {
        return $this->getForm()->getHtmlName() .
                '_' . $this->getName() . implode('_', $extraKeys);
    }

}
