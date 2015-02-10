<?php

namespace hemio\form\Abstract_;

use hemio\form as form_;
use hemio\form\exception;
use hemio\html;

/**
 * 
 *
 */
abstract class FormFieldDefault extends FormField {

    use form_\Trait_\MaintainsFilters;

    /**
     *
     * @var string
     */
    public $title = '';

    /**
     *
     * @var boolean 
     */
    protected $filled = false;

    /**
     *
     * @var html\Interface_\Submittable
     */
    protected $control;

    /**
     *
     * @var string
     */
    protected $defaultValue = '';

    /**
     * 
     * @param mixed $value
     */
    public function setDefaultValue($value) {
        $this->defaultValue = $value;
    }

    /**
     * @return mixed Default value
     */
    public function getValueDefault() {
        return $this->getFiltered($this->defaultValue);
    }

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

    public function getValueStored() {
        return $this->getFiltered(
                        $this->getForm()->getValueStored($this->getName()));
    }

    public function changed() {
        return $this->getValueStored() != $this->getValueUser();
    }

    /**
     * 
     * @return TemplateFormField
     * @throws exception\NotLazyEnough
     * @throws exception\AppendageTypeError
     */
    public function getFieldTemplateClone($special = null) {

        $appendageName = form_\FormPost::FORM_FIELD_TEMPLATE . '_' . $special;

        if (!$this->existsInheritableAppendage($appendageName)) {
            $appendageName = form_\FormPost::FORM_FIELD_TEMPLATE;
        }

        $template = $this->getInheritableAppendage($appendageName);

        if ($template instanceof TemplateFormField) {
            return clone $template;
        } elseif ($template === null) {
            throw new exception\NotLazyEnough(
            sprintf(
                    'There is no "%s" available for this Input', $appendageName
            )
            );
        } else {
            throw new exception\AppendageTypeError(
            sprintf(
                    'Not an istance of TemplateFormFieldSingle "%s"', $appendageName
            )
            );
        }
    }

    public function describe() {
        return 'INPUT';
    }

    /**
     * 
     * @return string
     */
    public function __toString() {
        if (!$this->filled)
            $this->fill();

        return parent::__toString();
    }

    abstract public function fill();

    public function setForm(Form $form) {
        $this->control->setAttribute('form', $form->getHtmlName());
        $this->addInheritableAppendage('_FORM', $form);
        $form->addLogicalChild($this);
    }

}
