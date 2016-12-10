<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.05.16
 * Time: 09:32
 */

/**
 * Class TableInclude
 */
class TableInclude {

    public $headerTemplate;
    public $rowTemplate;
    public $footerTemplate;

    protected $ci;

    /**
     * TableInclude constructor.
     * @param $headerTemplate
     * @param $rowTemplate
     * @param $footerTemplate
     */
    public function __construct($headerTemplate,$rowTemplate,$footerTemplate) {
        $this->ci = &get_instance();

        $this->headerTemplate = $headerTemplate;
        $this->rowTemplate = $rowTemplate;
        $this->footerTemplate = $footerTemplate;
    }

    /**
     * 
     */
    public function renderHeader() {
        $this->ci->load->view($this->headerTemplate);
    }

    /**
     * @param $aRow
     */
    public function renderRow($aRow) {
        $this->ci->load->view($this->rowTemplate, ['tableIncludeRowData' => $aRow]);
    }

    /**
     * 
     */
    public function renderFooter() {
        $this->ci->load->view($this->footerTemplate);
    }


}

/**
 * Class TableIncludeList
 */
class TableIncludeList {
    protected $ci;

    /**
     * @var TableInclude[]
     */
    public $aTableIncludes;

    public function __construct() {
        $this->ci = &get_instance();
        $this->aTableIncludes = [];
    }

    public function renderHeader() {
        foreach ($this->aTableIncludes as $oTableInclude) {
            $oTableInclude->renderHeader();
        }
    }

    public function renderRow($aRow) {
        foreach ($this->aTableIncludes as $oTableInclude) {
            $oTableInclude->renderRow($aRow);
        }
    }

    public function renderFooter() {
        foreach ($this->aTableIncludes as $oTableInclude) {
            $oTableInclude->renderFooter();
        }
    }

    /**
     * @param $oTableInclude TableInclude
     */
    public function add($oTableInclude) {
        $this->aTableIncludes[] = $oTableInclude;
    }
}