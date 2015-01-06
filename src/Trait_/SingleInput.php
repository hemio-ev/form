<?php

/*
 * Copyright (C) 2014 Michael Herold <quabla@hemio.de>
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

namespace hemio\form\Trait_;

use hemio\html;

/**
 * Description of FieldSingleInput
 *
 * @author Michael Herold <quabla@hemio.de>
 */
trait SingleInput {

    use FormElementSingle;

    /**
     * @return string Type value for input element
     */
    abstract function getInputType();

    /**
     * 
     * @return html\Input
     */
    public function getControlElement() {
        return $this->control;
    }

    /**
     * 
     * @return \hemio\form\Abstract_\TemplateFormFieldSingle
     */
    public function fill() {
        $template = $this->getSingleTemplateClone($this->getInputType());

        $this['_TEMPLATE'] = $template;
        $template->init($this, $this->control);
        $this->control->setAttribute('value', $this->getValueToUse());

        $this->filled = true;

        return $template;
    }

}
