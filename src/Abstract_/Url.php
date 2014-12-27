<?php

/*
 * FIXME: Das ganze teil
 * @todo 
 */

namespace hemio\form\Abstract_;

/**
 * @todo move to HTML lib
 */
abstract class Url {

    protected $arrPath = [];
    protected $arrGet = [];
    protected $strFragment = null;

    public function strPath() {
        return join('/', array_map('urldecode', $this->arrPath));
    }

    public function setGet($strKey, $strVal) {
        $this->arrGet[$strKey] = $strVal;
    }

    public function removeGet($strKey) {
        unset($this->arrGet[$strKey]);
    }

    public function strGet() {
        $strGet = '';

        foreach ($this->arrGet as $strKey => $strVal) {
            if ($strGet === '')
                $strGet = '?';
            else
                $strGet .= '&';

            $strGet .= sprintf('%s=%s', urldecode($strKey), urlencode($strVal));
        }

        return $strGet;
    }

    public function setFragment($strFragment) {
        $this->strFragment = $strFragment;
    }

    public function removeFragment() {
        $this->strFragment = null;
    }

    public function strFragment() {
        if ($this->strFragment !== null)
            return '#' . urldecode($this->strFragment);
        else
            return '';
    }

}
