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
 * Description of InputText
 *
 * @author Michael Herold <quabla@hemio.de>
 */
class FieldTextTest extends \Helpers {

    public function test1() {

        $inputName = 'form_test_input1';

        $post = [
            $inputName => 'New-X-value'
        ];

        $stored = [
            'input1' => 'DB-X-value'
        ];

        $form = new FormPost('test', $post, null, $stored);

        $input1 = new FieldText('input1', _('Title'));
        $input1->setDefaultValue('Default-X-value');
        $input1->setValueTransformation('remove_strange_x', function ($value) {
            return str_replace('-X-', ' ', $value);
        });
        $form->addChild($input1);

        $this->assertEquals($inputName, $input1->getHtmlName());

        $this->assertEquals('New value', $input1->getValueToUse(), 'Wrong valueToUse');
        $this->assertEquals('DB value', $input1->getValueStored(), 'Wrong valueStored');
        $this->assertEquals('New value', $input1->getValueUser(), 'Wrong valueUser');
        $this->assertEquals('Default value', $input1->getValueDefault(), 'Wrong valueDefault');
    }

}
