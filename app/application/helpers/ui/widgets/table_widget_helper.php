<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.01.16
 * Time: 13:28
 */

class SteenTableWidget extends SteenWidget {

    /**
     * @var TableHelper
     */
    protected $_tableHelper;

    function __construct($id, $aTableData = [], $title = '')
    {
        $this->_tableHelper = new TableHelper();
        $this->_tableHelper->setData($aTableData);
        
        parent::__construct($id, $title === '' ? 'Tabelle' : $title, $this->_tableHelper->template,$this->_tableHelper->getTableOptions());
        $this->icon = 'fa-table';
    }

    /**
     * @return array
     */
    public function getData() {
        $this->viewData = $this->_tableHelper->getTableOptions();
        return parent::getData();
    }

    /**
     * @param bool $output
     * @return mixed
     */
    public function renderWidgetBody($output = false) {

        $aData =
            array_merge($this->getData(), $this->_tableHelper->getTableOptions());

        return $this->_ci->load->view($this->viewPath,$aData, $output);
    }

    /**
     * @return TableHelper
     */
    public function getTableHelper() {
        return $this->_tableHelper;
    }

}