<?php

/*
 * Copyright (C) 2015 Sophie Herold <sophie@hemio.de>
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

namespace hemio\form\Abstract_;

use hemio\html\Interface_\Submittable;

/**
 * 
 *
 * @author Sophie Herold <sophie@hemio.de>
 */
abstract class TemplateFormField extends Template {

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var \hemio\html\Interface_\Submittable
     */
    protected $control;

    /**
     *
     * @var Abstract_\FormField
     */
    public $field;

    /**
     *
     * @var callable
     */
    protected $postInitHook;

    abstract public function init(FormField $field, Submittable $control);

    /**
     * 
     * @return \hemio\html\Interface_\Submittable
     */
    public function getControl() {
        return $this->control;
    }

    /**
     * 
     * @param \hemio\html\Interface_\Submittable $control
     * @return \hemio\html\Interface_\Submittable
     */
    public function setControl(\hemio\html\Interface_\Submittable $control) {
        $this->control = $control;
        return $control;
    }

    /**
     * 
     * @param \hemio\form\Abstract_\FormField $field
     * @return \hemio\form\Abstract_\FormField
     */
    public function setField(FormField $field) {
        $this->field = $field;
        return $field;
    }

    /**
     * 
     * @param \hemio\form\Abstract_\callable $function
     */
    public function setPostInitHook(callable $function) {
        $this->postInitHook = $function;
    }

}
