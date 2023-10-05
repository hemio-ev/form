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

namespace hemio\form;

/**
 * Description of CheckMinLength
 *
 * @author Sophie Herold <sophie@hemio.de>
 */
class CheckMinLength extends Check {

    protected $minLength;

    public function __construct($minLength) {
        $this->minLength = $minLength;
        $this->id = 'min_length';
        $this->message = 'The minimal length of ' . $minLength . ' is not reached.';
    }

    public function __invoke($value) {
        return strlen($value) >= $this->minLength;
    }

}
