<?php

namespace hemio\form\Trait_;

/**
 * Gives everything for the typical case, that the form element consists of
 * only one input/select/... field enbedded
 */
trait FormElementSingle {

    /**
     * Paragraph cotaining the label
     * @var html\P
     */
    protected $paragraph;

    /**
     * Label containing the element
     * @var \html\Label
     */
    protected $label;

    /**
     * Element something like Input/Select/...
     * @var html\Interface_\InputElement
     */
    protected $element;

    public function init(\hemio\html\Interface_\InputElement $element) {
        $this->paragraph = new html\P();
        $this->label = $this->paragraph->addChild(new \html\Label());
        $this->element = $this->label->addChild($element);
    }

    /**
     * Adds a css class to the paragraph. Designs of the label and the element
     * should be realized via the fact that they are childs of the paragraph.
     * 
     * @param string $className
     */
    public function addCssClass($className) {
        $this->paragrah->addCssClass($className);
    }

    /**
     * @see addCssClass()
     * @param string $className
     */
    public function removeCssClass($className) {
        $this->paragrah->removeCssClass($className);
    }

}
