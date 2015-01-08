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
 * Description of FieldSubmit
 *
 * @author Michael Herold <quabla@hemio.de>
 */
class FieldSubmit extends Abstract_\FormFieldDefault {

    public function __construct($name, $title) {
        $this->init($name, $title, new \hemio\html\Button());
    }

    public function clicked() {
        echo 'not implemented';
    }

    public function fill() {
        $template = $this->getFieldTemplateClone('SUBMIT');

        $this['_TEMPLATE'] = $template;
        $template->init($this, $this->control);

        $this->filled = true;

        return $template;
    }

}
