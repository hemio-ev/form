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
 * Description of CheckMinLength
 *
 * @author Michael Herold <quabla@hemio.de>
 */
class CheckMinLength extends Check {

    protected $minLength;

    public function __construct($minLength) {
        $this->minLength = $minLength;
        $this->check = $this;
        $this->id = 'min_length';
        $this->message = 'min length is ' . $minLength;
    }

    public function __invoke($value) {
        return strlen($value) >= $this->minLength;
    }

}
