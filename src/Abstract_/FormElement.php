<?php

namespace hemio\form\Abstract_;

use hemio\form\exception;

/**
 *
 */
abstract class FormElement extends \hemio\form\Container
{
    protected $name     = '';
    protected $idSuffix = null;

    /**
     * Is active value in the form correct.
     *
     * @return boolean
     */
    abstract public function dataValid();

    /**
     * Get the form to which this element belongs
     *
     * @return Abstract_\Form
     * @throws exception\NotLazyEnough
     */
    public function getForm()
    {
        if ($this->existsInheritableAppendage('_FORM'))
            return $this->getInheritableAppendage('_FORM');
        else {
            throw new exception\NotLazyEnough(
            'No Form for FormElement found. Maybe not yet a child of a Form.'
            );
        }
    }

    /**
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @param array $extraKeys
     * @return string
     */
    public function getHtmlName(array $extraKeys = [])
    {
        return sprintf('%s_%s%s'
            , $this->getForm()->getHtmlName()
            , $this->getName()
            , implode('_', $extraKeys)
        );
    }

    /**
     *
     * @param array $extraKeys
     * @return string
     */
    public function getHtmlId(array $extraKeys = [])
    {
        return sprintf('%s_%s%s'
            , $this->getForm()->getHtmlName()
            , $this->getName()
            , $this->idSuffix === null ? '' : '_'.$this->idSuffix
            , implode('_', $extraKeys)
        );
    }

    public function getValueUser()
    {
        return $this->getForm()->getValueUser($this->getHtmlName());
    }
}
