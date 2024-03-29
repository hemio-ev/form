<?php

/*
 * Copyright (C) 2015-2016 Sophie Herold <sophie@hemio.de>
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

namespace hemio\form\template;

use hemio\form\Abstract_;
use hemio\html\Interface_\Submittable;

/**
 * Just the control element without any label etc.
 *
 * @author Sophie Herold <sophie@hemio.de>
 */
class FormPlainControl extends \hemio\form\Abstract_\TemplateFormField {

    public function __construct() {
        $this->setPostInitHook(function ($null) {
            return;
        });
    }

    public function init(Abstract_\FormField $field, Submittable $control) {
        $this->setControl($control);
        $this->setField($field);

        if (!$control->getAttribute('title'))
            $control->setAttribute('title', $field->title);

        $control->setAttribute('name', $field->getHtmlName());
        $control->setId($field->getHtmlId());

        $this->addChild($control);

        $hook = $this->postInitHook;
        $hook($this);
    }

}
