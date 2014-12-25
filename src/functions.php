<?php

namespace hemio\form;

/**
 * 
 * @param string $message
 * @return \hemio\html\String
 */
function _($message) {
    return new \hemio\html\String(\gettext($message));
}
