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

use hemio\form\exception;

/**
 * Description of FieldSingleInput
 *
 * @author Michael Herold <quabla@hemio.de>
 */
trait SingleInput {
    #protected $title;

    /**
     *
     * @var hemio\html\Input
     */
    protected $inputElement;

    /**
     * @return string Type value for input element
     */
    abstract function getInputType();

    /**
     * 
     * @return \hemio\form\Abstract_\TemplateFormFieldSingle
     */
    public function init(\hemio\html\Interface_\FormControl $control) {
        $template = $this->getSingleTemplateClone();
        $this['_TEMPLATE'] = $template;
        $template->init($this, $control);
        return $template;
    }

    /**
     * 
     * @return \hemio\form\Abstract_\TemplateFormFieldSingle
     * @throws exception\NotLazyEnough
     * @throws exception\AppendageTypeError
     */
    public function getSingleTemplateClone() {
        $template = $this->getInheritableAppendage('_INPUT_SINGLE_TEMPLATE');

        if ($template instanceof \hemio\form\Abstract_\TemplateFormFieldSingle) {
            return clone $template;
        } elseif ($template === null) {
            throw new exception\NotLazyEnough(
            'There is no "_INPUT_SINGLE_TEMPLATE" available for this Input');
        } else {
            throw new exception\AppendageTypeError(
            'Not an istance of TemplateFormFieldSingle "_INPUT_SINGLE_TEMPLATE"');
        }
    }

}
