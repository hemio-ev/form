<?php

/*
 * Copyright (C) 2016 Michael Herold <quabla@hemio.de>
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
 * Check against a HTML5 form pattern
 *
 * @author Michael Herold <quabla@hemio.de>
 */
class CheckPattern extends Check {

    protected $pattern;

    /**
     * 
     * @param type $id 
     * @param type $pattern Regex pattern without anchors (example: [a-z]+)
     * @param type $message
     */
    public function __construct($id, $pattern, $message = null) {
        $this->pattern = '/^' . $pattern . '$/';
        $this->check = $this;
        $this->id = $id;
        $this->message = $message;

        if (!is_int(preg_match($this->pattern, '')))
            throw new \Exception('Invalid pattern ' . $pattern . ' for check ' . $id);
    }

    public function __invoke($value) {
        return preg_match($this->pattern, $value) === 1;
    }

}
