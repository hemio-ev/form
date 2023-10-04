<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace hemio\form;

/**
 * Test gettext features
 *
 * @author Sophie Herold <sophie@hemio.de>
 */
class Gettext extends \Helpers {

    public function testBasic() {
        $doc = self::getDocumentBody();
        $doc->addChild(_('Basic test string'));

        $this->_assertEqualsXmlFile($doc, 'gettextBasic.html');
    }

}
