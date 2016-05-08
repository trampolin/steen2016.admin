<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 07.05.16
 * Time: 12:49
 */

abstract class WidgetHeaderInclude {

    protected $_ci;

    public $template;
    public $parentWidgetId;
    public $id;

    function __construct($template) {
        $this->template = $template;
        $this->_ci =& get_instance();
    }

    public abstract function getData();

    /**
     * @param bool $output
     * @return mixed
     */
    public function render($output = false) {
        return $this->_ci->load->view($this->template,$this->getData(),$output);
    }
    
}

class WidgetHeaderIncludeList {

    protected $_ci;

    public $aIncludes;
    public $parentWidgetId;

    function __construct($parentWidgetId) {
        $this->parentWidgetId = $parentWidgetId;
        $this->_ci =& get_instance();
    }

    /**
     * @param $oHeaderInclude WidgetHeaderInclude
     */
    public function addHeaderInclude($oHeaderInclude) {
        $oHeaderInclude->parentWidgetId = $this->parentWidgetId;
        $this->aIncludes[] = $oHeaderInclude;
    }

    /**
     * @return array
     */
    public function getData() {
        return [
            'aWidgetHeaderIncludes' => $this->aIncludes
        ];
    }

    public function isEmpty() {
        return count($this->aIncludes) === 0;
    }

    /**
     * 
     */
    public function render() {
        if (!$this->isEmpty()) {
            $this->_ci->load->view('partials/modules/widget/header_include_wrapper', $this->getData());
        }
    }

}