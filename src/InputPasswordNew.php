<?php

namespace hemio\form;

use hemio\html;

class InputPasswordNew
        extends Abstract_\Input {

    public function __toString() {
        $template = $this->getInheritableAppendage('_INPUT_SINGLE_TEMPLATE');
        $tmpl1 = ($this[] = clone $template);
        $tmpl2 = ($this[] = clone $template);
        $tmpl1->setFormElement($this);
        $tmpl1->addInheritableAppendage('_INPUT_ELEMENT',
                new html\Input('password'));
        $tmpl2->setFormElement($this);
        $tmpl2->addInheritableAppendage('_INPUT_ELEMENT',
                new html\Input('password'));

        return parent::__toString();
    }

}
