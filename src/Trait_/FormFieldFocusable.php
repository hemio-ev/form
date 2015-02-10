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

namespace hemio\form\Abstract_;

/**
 * Description of FormFieldFocusable
 *
 * @author Michael Herold <quabla@hemio.de>
 */
trait FormFieldFocusable {

    /**
     *
     * @var integer
     */
    protected $focusCardinality;

    /**
     * 
     * @return integer
     */
    public function getFocusCardinality() {
        return $this->focusCardinality;
    }

    public function setAutofocus($autofocus = true, $cardinality = 0) {
        $this->focusCardinality = $cardinality;
        $this->getControlElement()->setAttribute('autofocus', (boolean) $autofocus);
    }

}
