<?php

namespace hemio\form;

class UrlRelative
        extends Abstract_\Url {

    public function __construct(array $arrPath = [], array $arrGet = [],
            $strFragment = null) {
        $this->arrPath = $arrPath;
        $this->arrGet = $arrGet;
        $this->strFragment = $strFragment;
    }

    public function __toString() {
        return $this->strPath() . $this->strGet() . $this->strFragment();
    }

}
