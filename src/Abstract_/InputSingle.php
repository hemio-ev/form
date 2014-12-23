<?php

namespace hemio\form\Abstract_;

use hemio\html;

/**
 * 
 *
 */
abstract class InputSingle extends Input {

    use \hemio\form\Trait_\MaintainsFilters;

    public $blnRequired = false;
    public $strDefaultValue = '';

    /**
     * 
     * @param \hemio\html\Interface_\InputElement $inputElement
     * @return \hemio\html\Interface_\InputElement
     */
    public function init(html\Interface_\InputElement $inputElement) {
        $this->addInheritableAppendage('_INPUT_ELEMENT', $inputElement);
        return $inputElement;
    }

    /**
     * 
     * @return \hemio\html\Interface_\InputElement
     */
    public function getInputElement() {
        return $this->getInheritableAppendage('_INPUT_ELEMENT');
    }

    public function __toString() {
        $template = ($this[] = $this->getTemplateClone());
        $template->setFormElement($this);
        $this->getInputElement()->setAttribute('required', $this->blnRequired);
        return parent::__toString();
    }

    public function getValueToUse() {
        if ($this->getValueUser() !== null)
            return $this->getValueUser();
        else if ($this->getValueStored() !== null)
            return $this->getValueStored();
        else
            return $this->getValueDefault();
    }

    public function getValueUser() {
        $value = $this->getForm()->getValueUser($this->getHtmlName());
        if ($value === null)
            return null;
        else
            return $this->getFiltered($value);
    }

    public function getValueStored() {
        return $this->getFiltered(
                        $this->getForm()->getValueStored($this->getName()));
    }

    public function getValueDefault() {
        return $this->getFiltered($this->strDefaultValue);
    }

    public function changed() {
        return $this->getValueStored() != $this->getValueUser();
    }

    public function describe() {
        return 'INPUT';
    }

}
