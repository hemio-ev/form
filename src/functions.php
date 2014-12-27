<?php

#namespace hemio\form;

/**
 * 
 * @param string $message
 * @return \hemio\html\String
 */
function __($message) {
    return new \hemio\html\String(\gettext($message));
}
