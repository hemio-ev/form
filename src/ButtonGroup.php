<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace hemio\form;

use hemio\html;

/**
 * Groups a bunch of buttons
 *
 * @since 1.0
 */
class ButtonGroup extends html\Fieldset {

    /**
     * 
     * @param array $buttons
     */
    public function __construct(array $buttons = []) {
        $this->addInheritableAppendage('_INPUT_SINGLE_TEMPLATE', new TemplateFormSingle());

        foreach ($buttons as $button) {
            $this[$button->getName()] = $button;
        }
    }

}
