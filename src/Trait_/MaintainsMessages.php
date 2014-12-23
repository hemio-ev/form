<?php

namespace hemio\form\Trait_;

trait MaintainsMessages {

    protected $arrMessages = array();

    protected function addMessage(Message $objMessage) {
        $this->arrMessages[] = $objMessage;
        return $objMessage;
    }

    public function getMessages() {
        return $this->arrMessages;
    }

    // TODO: Das ding plauert evtl. Geheimnisse aus, -1 sollte anders gehandhabt werden
    public function addException($intResult) {
        return $this->addMessage(
                        new Message('exception', \STR::ExceptionMsg . $intResult));
    }

    public function addError($strText, ModuleBlock $objBlock = null, $arrLocalVars = array()) {
        $arrVars = array();
        if ($objBlock)
            $arrVars = $objBlock->getVars($arrLocalVars);

        return $this->addMessage(
                        new Message('error', $this->getL10nStr($strText), $arrVars));
    }

    public function addWarning($strText, ModuleBlock $objBlock = null, $arrLocalVars = array()) {
        $arrVars = array();
        if ($objBlock)
            $arrVars = $objBlock->getVars($arrLocalVars);

        return $this->addMessage(
                        new Message('warning', $this->getL10nStr($strText), $arrVars));
    }

    public function addSuccess($strText, ModuleBlock $objBlock = null, $arrLocalVars = array()) {
        $arrVars = array();
        if ($objBlock)
            $arrVars = $objBlock->getVars($arrLocalVars);

        return $this->addMessage(
                        new Message('success', $this->getL10nStr($strText), $arrVars));
    }

}
