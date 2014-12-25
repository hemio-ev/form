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

    public function __construct($name, array $post = null, array $get = null, array $stored = []) {
        if ($post === null)
            $post = $_POST;

        if ($get === null)
            $get = $_GET;

        $this->post = $post;
        $this->get = $get;
        $this->name = $name;

        $this->setAttribute('name', $this->getHtmlName());
        $this->setId($this->getHtmlName());
        $this->addInheritableAppendage('_INPUT_SINGLE_TEMPLATE', new \hemio\form\TemplateFormLineP);
        $this->addInheritableAppendage('_FORM', $this);
    }

    /**
     * @todo potentially completly useless in this functions, form elements should have this options?
     * @return TemplateFormLine
     */
    public function getLineTemplate() {
        return $this->getInheritableAppendage('_INPUT_SINGLE_TEMPLATE');
    }

    /**
     * Check for occured errors
     * 
     * @return boolean
     */
    public function dataValid() {
        foreach (new \RecursiveIteratorIterator($this) as $child) {
            if ($child instanceof Abstract_\FormElement && !$child->dataValid()) {
                return false;
            }
        }

        return true;
    }

    /**
     * 
     * @return string
     */
    public function getHtmlName() {
        return 'form_' . $this->name;
    }

    /**
     * 
     * @return string
     */
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
     * Stored values like from DB?
     * 
     * @todo unclear
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

    /**
     * Get value from GET or POST
     * 
     * @since 1.0
     */
    abstract public function getValueUser($key);
}
