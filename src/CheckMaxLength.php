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
 * Description of CheckLength
 *
 * @author Sophie Herold <sophie@hemio.de>
 */
class CheckMaxLength extends Check {

    protected $maxLength;

    public function __construct($maxLength) {
        $this->maxLength = $maxLength;
        $this->id = 'max_length';
        $this->message = 'The maximal length of ' . $maxLength . ' is exceeded.';
    }

    public function __invoke($value) {
        return strlen($value) <= $this->maxLength;
    }

}
