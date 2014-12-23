<?php

namespace hemio\form\Abstract_;

abstract class Input extends FormElement {

    /**
     * 
     * @param string $name
     */
    public function __construct($name) {
        $this->name = $name;
        $this->addInheritableAppendage('_INPUT_ELEMENT', $this);
    }

    public function getTemplateClone() {
        if ($this->getInheritableAppendage('_INPUT_SINGLE_TEMPLATE') === null) {
            error_log(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
            throw new ToLazyA;
        } else
            return clone $this->getInheritableAppendage('_INPUT_SINGLE_TEMPLATE');
    }

    public function getName() {
        return $this->name;
    }

    public function getHtmlName(array $extraKeys = []) {
        return $this->getForm()->getName() .
                '_' . implode('_', $extraKeys) .
                '_' . $this->getName();
    }

    public function changed() {
        return false;
    }

    public function dataValid() {
        return true;
    }

}
