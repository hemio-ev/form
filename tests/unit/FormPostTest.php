<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace hemio\form;

/**
 * Description of FormPostTest
 *
 * @author Michael Herold <quabla@hemio.de>
 */
class FormPostTest extends \Helpers {

    public function test1() {
        $form = new FormPost('form-1');
        $form->addChild(new FieldText('text_input', 'Text input'));

        $this->_assertEqualsXmlFile($form, 'formPost.html');
    }

}
