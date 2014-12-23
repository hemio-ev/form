<?php

namespace hemio\form\Abstract_;

abstract class Form extends \hemio\html\Form {

    use \hemio\form\Trait_\MaintainsHtmlL10n;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var array
     */
    private $get = [];

    /**
     *
     * @var array
     */
    private $post = [];
    public $arrStoredValues = [];

    public function __construct($name) {
        $this->name = $name;
        $this->post = $_POST;
        $this->get = $_GET;
        $this->setAttribute('name', $this->getHtmlName());
        $this->setId($this->getHtmlName());
        $this->addInheritableAppendage('_INPUT_SINGLE_TEMPLATE', new TemplateFormLineP);
        $this->addInheritableAppendage('_FORM', $this);
    }

    /**
     * 
     * @return TemplateFormLine
     */
    public function getLineTemplate() {
        return $this->getInheritableAppendage('_INPUT_SINGLE_TEMPLATE');
    }

    /**
     * check for occured errors
     * @return boolean
     */
    public function dataValid() {
        foreach (new \RecursiveIteratorIterator($this) as $child) {
            if ($child instanceof Abstract_\Input && !$child->dataValid()) {
                return false;
            }
        }

        return true;
    }

    public function getHtmlName() {
        return 'form_' . $this->name;
    }

    public function getName() {
        return $this->name;
    }

    /**
     * 
     * @param string $key
     * @return null|string
     */
    public function getPost($key) {
        if (isset($this->post[$key])) {
            return $this->post[$key];
        } else {
            return null;
        }
    }

    /**
     * 
     * @param string $key
     * @return mixed
     */
    public function getValueStored($key) {
        if (isset($this->arrStoredValues[$key])) {
            return $this->arrStoredValues[$key];
        } else {
            return null;
        }
    }

    abstract public function getValueUser($key);
}
