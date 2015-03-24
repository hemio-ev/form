<?php

namespace hemio\form\Abstract_;

use hemio\form as form_;
use hemio\form\exception;
use hemio\html;

/**
 *
 *
 */
abstract class FormFieldDefault extends FormField implements form_\Focusable
{

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
    public function setDefaultValue($value)
    {
        $this->defaultValue = $value;
    }

    /**
     * @return mixed Default value
     */
    public function getValueDefault()
    {
        return $this->getFiltered($this->defaultValue);
    }

    /**
     *
     * @return html\Input
     */
    public function getControlElement()
    {
        return $this->control;
    }

    /**
     *
     * @param string $name
     * @param string $title
     * @param html\Interface_\Submittable $control
     */
    public function init($name, $title, $control)
    {
        $this->name    = $name;
        $this->title   = $title;
        $this->control = $control;
        if (strlen($title) > 0)
            $this->setAccessKey($title[0]);
    }

    public function getValueToUse()
    {
        if ($this->getValueUser() !== null)
            return $this->getValueUser();
        else if ($this->getValueStored() !== null)
            return $this->getValueStored();
        else
            return $this->getValueDefault();
    }

    public function getValueStored()
    {
        return $this->getFiltered(
                $this->getForm()->getValueStored($this->getName()));
    }

    public function changed()
    {
        return $this->getValueStored() != $this->getValueUser();
    }

    /**
     *
     * @return TemplateFormField
     * @throws exception\NotLazyEnough
     * @throws exception\AppendageTypeError
     */
    public function getFieldTemplateClone($special = null)
    {

        $appendageName = form_\FormPost::FORM_FIELD_TEMPLATE.'_'.$special;

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

    public function describe()
    {
        return 'INPUT';
    }

    /**
     *
     * @return string
     */
    public function __toString()
    {
        if (!$this->filled)
            $this->fill();

        return parent::__toString();
    }

    abstract public function fill();

    public function setForm(Form $form)
    {
        $this->control->setAttribute('form', $form->getHtmlName());
        $this->addInheritableAppendage('_FORM', $form);
        $form->addLogicalChild($this);
    }

    public function setAccessKey($key)
    {
        $this->getControlElement()->setAttribute('accesskey', $key);
    }

    public function getHtmlTitle()
    {
        $accessKey = $this->getControlElement()->getAttribute('accesskey');
        if (strlen($accessKey) !== 1) {
            return new html\String($this->title);
        } else {
            $matches = [];
            if (preg_match('/^(.*?)('.$accessKey.')(.*)$/i', $this->title,
                           $matches)) {
                $container = new form_\Container;

                $u = new html\U();
                $u->addChild(new html\String($matches[2]));

                $container->addChild(new html\String($matches[1]));
                $container->addChild($u);
                $container->addChild(new html\String($matches[3]));

                return $container;
            } else {
                $container = new form_\Container;
                $container->addChild(new html\String($this->title.' ('));

                $u = new html\U();
                $u->addChild(new html\String($accessKey));

                $container->addChild($u);

                $container->addChild(new html\String(')'));

                return $container;
            }
        }
    }
    protected $autofocusLevel = 5;

    /**
     *
     * @param bool $focus
     */
    public function setAutofocus($focus = true, $level = 10)
    {
        if ($focus)
            $this->autofocusLevel = $level;
        else
            $this->autofocusLevel = 0;
    }

    public function getAutofocusLevel()
    {
        return $this->autofocusLevel;
    }

    public function engageAutofocus()
    {
        $this->getControlElement()->setAttribute('autofocus', true);
    }

    /**
     *
     * @param boolean $required
     */
    public function setRequired($required = true)
    {
        $this->addValidityCheck(new form_\CheckMinLength(1));
        $this->required = $required;
        $this->getControlElement()->setAttribute('required', (boolean) $required);
    }
}
