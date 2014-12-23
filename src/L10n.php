<?php

namespace hemio\form;

/**
 *
 */
class L10n {

    /**
     * @var L10n
     */
    public $objChild = null;

    /**
     * @var array
     */
    public $arrString = [];

    /**
     * @var array
     */
    public $arrContent = [];

    /**
     * @var string
     */
    public $strLang;

    /**
     * @var unknown
     */
    private $arrVars = [];
    public $strFile = 'NOFILE';

    /**
     * @param string $strLang
     * @param L10n $objChild
     */
    public function __construct($strLang, L10n $objChild = null) {
        $this->objChild = $objChild;
        $this->strLang = $strLang;
    }

    /**
     * @param string $strFile
     */
    public function loadFromIniFile($strFilename) {
        // TODO: the following line is more like debug code, that can be removed
        $this->strFile = $strFilename;
        if (is_readable($strFilename)) {
            $arrFile = parse_ini_file($strFilename, true);
            $this->arrString = $arrFile['string'];

            if (array_key_exists('markdown', $arrFile)) {
                foreach ($arrFile['markdown'] as $key => $value) {
                    $this->arrContent[$key] = Markdown($value);
                }
            }
        } else {
            trigger_error('There is no L10n file `' . $strFilename . '`',
                    E_USER_NOTICE);
        }
    }

    /**
     * @param string $strKey
     * @return string
     */
    public function getString($strKey) {
        $strContent = $this->getTemplate($strKey);

        return $this->parseVars($strContent);
    }

    # TODO: not really implemented

    public function getContent($strKey) {
        return $this->parseVars($this->arrContent[$strKey]);
    }

    public function parseVars($strSource) {
        foreach ($this->arrVars as $strVarName => $strVarValue)
                $strSource = str_replace('%' . $strVarName . '%', $strVarValue,
                    $strSource);

        return $strSource;
    }

    public function getTemplate($strKey) {
        if (array_key_exists($strKey, $this->arrString))
                return $this->arrString[$strKey];
        else if ($this->objChild !== null)
                return $this->objChild->getTemplate($strKey);
        else return '¿#' . $strKey . '?' . $this->strFile;
    }

    /**
     * @return string
     */
    public function getLang() {
        return $this->strLang;
    }

    /**
     * @return L10n
     */
    public function getEnhanced() {
        return new L10n($this->strLang, $this);
    }

    public function getVar($strKey) {
        return $this->arrVars[$strKey];
    }

    /**
     * Sets a locaization variable.
     * 
     * Localization variables are accessible via localization strings.
     * 
     * @param type $varName
     * @param type $varValue
     */
    public function setVar($varName, $varValue) {
        $this->arrVars[$varName] = $varValue;
    }

}
