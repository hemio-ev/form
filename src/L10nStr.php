<?php

namespace hemio\form;

use hemio\html;

class L10nStr
        implements html\Interface_\ContentModelText, html\Interface_\MaintainsAppendages {

    use html\Trait_\AppendageMaintainance,
        Trait_\MaintainsHtmlL10n;

    private $strKey;

    function __construct($strKey) {
        $this->strKey = $strKey;
    }

    public function __toString() {
        #var_dump($this->arrInheritableAppendages);
        if ($this->getInheritableAppendage('_L10N') instanceof L10n) {
            return $this->getInheritableAppendage('_L10N')
                            ->getString($this->strKey);
        } else {
            return '¿L10n-NULL:' . $this->strKey . '?';
        }
    }

    
    public function describe() {
        return 'L10NSTR';
    }
}
