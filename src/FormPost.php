<?php

namespace hemio\form;

/**
 * Forms with the method POST
 * 
 * @since 1.0
 */
class FormPost extends Abstract_\Form {

    public function __construct($name, array $post = null, array $get = null, array $stored = []) {
        parent::__construct($name, $post, $get, $stored);
        $this->addChild(new InputHidden($this->getIdentifierName(), ''));
        $this->setAttribute('method', 'post');
    }

    public function submitted() {
        return $this->getPost($this->getIdentifierName()) !== null;
    }

    public function getIdentifierName() {
        return $this->name . '___form_identifier';
    }

    public function correctSubmitted() {
        return $this->submitted() && $this->dataValid();
    }

    public function getValueUser($key) {
        return $this->getPost($key);
    }

}
