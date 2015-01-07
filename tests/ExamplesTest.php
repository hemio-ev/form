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
        $body['form'] = $form;

        $section = new \hemio\html\Section();
        $form[] = $section;

        $inputText = new FieldText('input_text', _('Text'));
        $section[] = $inputText;

        $select = new FieldSelect('select', _('Select'));
        foreach ([1, 2, 3, 4, 5, 6] as $i)
            $select->addOption('value' . $i, _('Value ' . $i));
        $section[] = $select;

        $inputPassword = new FieldPassword('input_password');
        $section[] = $inputPassword;

        $textarea = new FieldTextarea('textarea', _('Long Text'));
        $section[] = $textarea;

        $checkbox = new FieldCheckbox('checkbox', _('Checkbox'));
        $section[] = $checkbox;

        $email = new FieldEmail('email');
        $email->getControlElement()->setAttribute('placeholder', 'user@example.org');
        $section[] = $email;

        $form->arrStoredValues = [
            'input_text' => 'Default Text',
            'input_password' => 'my-secret-password'
        ];

        return $doc;
    }

    public function test1() {
        $doc = $this->exampleForm();

        $this->_assertEqualsXmlFile($doc, 'examplesBasicForm.html');
    }

    public function test2() {
        $doc = $this->exampleForm();
        $doc->getHtml()->getHead()->addCssFile('style.css');

        $form = $doc->getHtml()->getBody()['form'];

        // default template to patch
        $template = $form->getSingleControlTemplate();

        // patch template for <select> controls
        $templateSelect = clone $template;
        $templateSelect['P']['SPAN'] = new \hemio\html\Span();
        $templateSelect['P']['SPAN']->addCssClass('select');
        $templateSelect->setPostInitHook(function ($template) {
            unset($template['P']['CONTROL']);
            $template['P']['SPAN']['CONTROL'] = $template->control;
        });

        $form->addInheritableAppendage(FormPost::SINGLE_CONTROL_TEMPLATE . '_SELECT', $templateSelect);

        // patch template for <input type=checkbox /> controls
        $templateSwitch = clone $template;
        $templateSwitch->setPostInitHook(function ($template) {
            $template->control->addCssClass('switch');
            $template['P']->addChildBeginning($template->control);
            unset($template['P']['CONTROL']);

            $labelText = $template['P']['LABEL'][0];
            unset($template['P']['LABEL'][0]);
            $spanLabel = new \hemio\html\Span();
            $spanLabel[] = $labelText;

            $template['P']['LABEL'][] = $spanLabel;
            $template['P']['LABEL'][] = new \hemio\html\Span();
        });

        $form->addInheritableAppendage(FormPost::SINGLE_CONTROL_TEMPLATE . '_checkbox', $templateSwitch);


        $this->_assertEqualsXmlFile($doc, 'examplesAdjustedForm.html');
    }

}
