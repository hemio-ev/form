<?php

namespace hemio\form;

use hemio\html;

/**
 * Containers collect several HTML generating elements without
 * adding additional visible structure to the output. They basically act like
 * (@link hemio\html\Abstract_\ElementContent) without producing an element tag.
 * 
 * @since 1.0
 */
class Container implements \hemio\html\Interface_\MaintainsChilds, \hemio\html\Interface_\HtmlCode {

    use \hemio\html\Trait_\AppendageMaintainance,
        \hemio\html\Trait_\ChildMaintainance;

    /**
     * 
     * @return string
     */
    public function __toString() {
        $return = '';

        foreach ($this as $child)
            $return .= (string) $child;

        return $return;
    }

    public function isValidChild(\hemio\html\Interface_\HtmlCode $child) {
        return true;
    }

    public function addChild(\hemio\html\Interface_\HtmlCode $child) {
        return $this->addChildInternal($child);
    }

    public function describe() {
        return sprintf('CONTAINER(%d)', $this->count());
    }

}
