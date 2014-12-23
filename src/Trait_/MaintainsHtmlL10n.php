<?php

namespace hemio\form\Trait_;

trait MaintainsHtmlL10n {

    /**
     * 
     * @param \form\L10n $objL10n
     */
    public function setL10n(L10n $objL10n) {
        $this->addInheritableAppendage('_L10N', $objL10n);
    }

    /**
     * 
     * @return L10n|null
     */
    public function getL10n() {
        return $this->getInheritableAppendage('_L10N');
    }

    /**
     * Return the locaization string for the given key from the current L10n
     * object.
     * 
     * @param string $key
     * @return string
     */
    public function getL10nStr($key) {
        if ($this->getL10n() !== null)
            return $this->getL10n()->getString($key);
        else
            return '¿MaintainsHtml_NoL10nObject:' . $key . '?';
    }

    /**
     * Sets a new or overwrites an existing localzation variable in the current
     * L10n object.
     * 
     * @see L10n::setVar()
     * 
     * @param string $varName
     * @param mixed $varValue
     */
    public function setVar($varName, $varValue) {
        $this->getL10n()->setVar($varName, $varValue);
    }

    public function getVar($varName) {
        return $this->getL10n()->getVar($varName);
    }

}
