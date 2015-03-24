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
 * Description of CheckEmail
 *
 * @author Michael Herold <quabla@hemio.de>
 */
class CheckTel extends Check
{

    public function __construct($multiple = false)
    {
        $this->check   = $this;
        $this->id      = 'tel';
        $this->message = _('Not a valid phone number (format +<country>-<prefix>-<number>)');
    }

    public function __invoke($tel)
    {
        return preg_match('/^\+\d{1,4}-\d+-\d+$/', $tel);
    }
}
