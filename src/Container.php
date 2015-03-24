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
class Container implements html\Interface_\MaintainsChilds, html\Interface_\HtmlCode
{

    use html\Trait_\AppendageMaintainance,
        html\Trait_\ChildMaintainance,
        \hemio\html\Trait_\HooksToString;

    /**
     *
     * @return string
     */
    public function __toString()
    {
        foreach ($this->hooksToString as $hook)
            $hook($this);

        $return = '';

        foreach ($this as $child)
            $return .= $child->__toString();

        return $return;
    }

    public function isValidChild(html\Interface_\HtmlCode $child)
    {
        return true;
    }

    public function addChild(html\Interface_\HtmlCode $child)
    {
        return $this->addChildInternal($child);
    }

    public function describe()
    {
        return sprintf('CONTAINER(%d)', $this->count());
    }
}
