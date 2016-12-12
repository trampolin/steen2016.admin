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

class DisconnectTableInclude extends TableInclude {

    protected $_sSourceType;
    protected $_sTargetType;
    protected $_iSourceId;
    protected $_sTargetFieldName;

    public function __construct($sSourceType,$sTargetType,$iSourceId,$sTargetFieldName) {
        parent::__construct(
            'partials/modules/table/disconnect_include/header',
            'partials/modules/table/disconnect_include/row',
            'partials/modules/table/disconnect_include/footer'
        );

        $this->_iSourceId = $iSourceId;
        $this->_sSourceType = $sSourceType;
        $this->_sTargetFieldName = $sTargetFieldName;
        $this->_sTargetType = $sTargetType;
    }

    /**
     * @param $aRow
     */
    public function renderRow($aRow) {

        if (is_array($aRow)) {
            $aRow['source_type'] = $this->_sSourceType;
            $aRow['source_id'] = $this->_iSourceId;
            $aRow['target_type'] = $this->_sTargetType;
            $aRow['target_field_name'] = $this->_sTargetFieldName;
        } else {
            $aRow->{'source_type'} = $this->_sSourceType;
            $aRow->{'source_id'} = $this->_iSourceId;
            $aRow->{'target_type'} = $this->_sTargetType;
            $aRow->{'target_field_name'} = $this->_sTargetFieldName;
        }

        parent::renderRow($aRow);
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