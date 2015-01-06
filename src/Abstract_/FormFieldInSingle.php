<?php

namespace hemio\form\Abstract_;

use hemio\html;

/**
 * 
 *
 */
abstract class FormFieldInSingle extends FormFieldIn {

    use \hemio\form\Trait_\MaintainsFilters;

    public $title = '';
    public $defaultValue;

    /**
     * 
     * @param string $name
     * @param string $title
     * @param html\Interface_\Submittable $control
     */
    public function init($name, $title, $control) {
        $this->name = $name;
        $this->title = $title;
        $this->control = $control;
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
        return $this->getFiltered($this->defaultValue);
    }

    public function changed() {
        return $this->getValueStored() != $this->getValueUser();
    }

    public function describe() {
        return 'INPUT';
    }

}
