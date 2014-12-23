<?php
namespace hemio\form;

trait MaintainsL10n {
	protected $objL10n = null;
	
	public function setL10n(L10n $objL10n) {
		$this->objL10n = $objL10n;
	}
	
	/**
	 * @var L10n
	 */
	public function getL10n() {
		return $this->objL10n;
	}
	
	public function getL10nStr($strKey) {
		if ($this->getL10n() !== null)
			return $this->getL10n()->getString($strKey);
		else
			return '¿Maintains+NULL:' . $strKey . '?';
	}
	
	public function getVar($strKey) {
		return $this->getL10n()->getVar($strKey);
	}
	
	public function setVar($strKey, $strValue) {
		$this->getL10n()->setVar($strKey, $strValue);
	}
}