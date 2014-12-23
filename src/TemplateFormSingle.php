<?php

namespace hemio\form;

use hemio\html;

/**
 * 
 *
 */
class TemplateFormSingle
        extends Abstract_\TemplateFormLine {

    protected $blnContentSattled = false;
    protected $objFormElement = null;
    public $value = '';

    public function addInheritableAppendage($key, $appendage) {
        parent::addInheritableAppendage($key, $appendage);
        switch ($key) {
            case '_INPUT_ELEMENT':
                $this->blnContentSattled = false;
                break;
        }
    }

    public function __toString() {
        if (!$this->blnContentSattled) {
            $this->sattleContent();
        }

        return parent::__toString();
    }

    public function setFormElement(Abstract_\Input $objFormElement) {
        $this->objFormElement = $objFormElement;
    }

    public function sattleContent() {
        $inputHtml = $this->getInheritableAppendage('_INPUT_ELEMENT');
        if (!($inputHtml instanceof html\Interface_\InputElement))
                trigger_error('TemplateFormSingle got no Input field',
                    E_USER_ERROR);

        $inputForm = $this->objFormElement;

        if ($inputHtml !== null && $inputForm !== null) {
            $inputHtml->setAttribute('name', $inputForm->getHtmlName());
            $inputHtml->setId($inputForm->getHtmlName());

            $this['_INPUT_ELEMENT'] = $inputHtml;

            $this->blnContentSattled = true;
        }
    }

}
