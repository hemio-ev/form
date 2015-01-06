<?php

/*
 * Copyright (C) 2015 Michael Herold <quabla@hemio.de>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace hemio\form;

/**
 * Description of Examples
 *
 * @author Michael Herold <quabla@hemio.de>
 */
class ExamplesTest extends \Helpers {

    /**
     * 
     * @return \hemio\html\Document
     */
    public function exampleForm() {
        $doc = new \hemio\html\Document(new \hemio\html\String(_('Title')));

        $form = new FormPost('name');
        $body = $doc->getHtml()->getBody();
        $body[] = $form;

        $section = new \hemio\html\Section();
        $form[] = $section;

        $inputText = new InputText('input_text', _('Text'));
        $section[] = $inputText;

        $inputSelect = new InputSelect('select', _('Select'));
        foreach ([1, 2, 3, 4, 5, 6]as $i)
            $inputSelect->addOption('value' . $i, _('Value ' . $i));
        $section[] = $inputSelect;

        return $doc;
    }

    public function test1() {
        $doc = $this->exampleForm();

        $this->_assertEqualsXmlFile($doc, 'examplesBasicForm.html');
    }

    public function test2() {
        $doc = $this->exampleForm();
        $doc->getHtml()->getHead()->addCssFile('style.css');

        $this->_assertEqualsXmlFile($doc, 'examplesAdjustedForm.html');
    }

}
