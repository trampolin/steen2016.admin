<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.01.16
 * Time: 01:02
 */

class TableHelper
{
    // the data to show
    private $_data = array();
    // key mappings -> converts raw keys to user defined values
    private $_keyMappings = array();#
    // convert fields to links
    private $_links = array();
    // convert values (see below)
    private $_valueConversions = array();
    // don't show specified fields
    private $_ignoreFields = array();
    // show debug info

    private $_aCustomFieldList = [];

    public $tableId;

    public $debug = false;

    public $template;

    public static $dateFormat = 'd.m.Y';

    function __construct() {
        $this->template = 'partials/modules/data_table';
    }

    /**
     * Set the data to show
     *
     * @param array $data
     */
    public function setData($data)
    {
        $this->_data = $data;
    }

    /**
     * @param string[] $aFieldList
     */
    public function setCustomFieldList($aFieldList) {
        $this->_aCustomFieldList = $aFieldList;
    }

    /**
     * Add a key,value pair - when the table is rendered, the TH Elements will contain $value instead of $key
     *
     * @param string $key
     * @param string $value
     */
    public function addKeyMapping($key, $value)
    {
        $this->_keyMappings[$key] = $value;
    }

    /**
     * Adds multiple key value pairs to key mapping
     *
     * @param array $array
     */
    public function addKeyMappings($array)
    {
        foreach ($array as $key => $mapping) {
            $this->addKeyMapping($key, $mapping);
        }
    }

    /**
     * Add a link binding
     *
     * say we have a row like [id,label,comment]
     * and we want to add a link to the label column which points to {BASE_URL}/details/{id}
     *
     * we call bindLink('label',BASE_URL.'details/','id')
     *
     * @param string $key
     * @param string $prefix
     * @param string $field
     * @param string $suffix
     * @param string $class
     * @param string $customTitle
     */
    public function bindLink($key, $prefix, $field, $suffix = '', $class = '', $customTitle = '')
    {
        $this->_links[$key] = [
            'prefix' => $prefix,
            'field' => $field,
            'suffix' => $suffix,
            'class' => $class,
            'customTitle' => $customTitle
        ];
    }

    /**
     * Allows us to convert a special value
     *
     * say we have column 'allow_read' containing 1 or 0 for true and false
     * we want to show this as CHECK or X to be more readable
     *
     *  call bindConversion('allow_read','fa-bool');
     *
     * now instead of 1 or 0 it shows the font-awesome icons fa-check or fa-times
     *
     * PS: More Types of conversions will be added later;
     *
     * @param string $key
     * @param string $conversion
     */
    public function bindConversion($key, $conversion)
    {
        $this->_valueConversions[$key] = $conversion;
    }

    /**
     * convert multiple columns
     *
     * @param array $array
     */
    public function bindConversions($array) {
        foreach ($array as $key => $conversion) {
            $this->bindConversion($key,$conversion);
        }
    }

    /**
     * Add a column to the ignore list
     *
     * @param string $key
     */
    public function ignoreField($key)
    {
        $this->_ignoreFields[] = $key;
    }

    /**
     * ignore multiple fields
     *
     * @param array $array
     */
    public function ignoreFields($array) {
        foreach($array as $ignore) {
            $this->ignoreField($ignore);
        }
    }

    /**
     * reset table to default values and clear data
     */
    public function reset()
    {
        $this->_ignoreFields = array();
        $this->_valueConversions = array();
        $this->_links = array();
        $this->_keyMappings = array();
        $this->_data = array();
    }


    /**
     * returns table options for the table view
     *
     * @return array
     */
    public function getTableOptions()
    {
        $result = [
            'tableData' => $this->_data,
            'tableDebug' => $this->debug,
            'tableId' => $this->tableId
        ];

        if (count($this->_keyMappings) > 0) {
            $result['tableKeyMappings'] = $this->_keyMappings;
        }

        if (count($this->_valueConversions) > 0) {
            $result['tableValueConversions'] = $this->_valueConversions;
        }

        if (count($this->_links) > 0) {
            $result['tableLinks'] = $this->_links;
        }

        if (count($this->_ignoreFields) > 0) {
            $result['tableIgnoreFields'] = $this->_ignoreFields;
        }

        if (count($this->_aCustomFieldList) > 0) {
            $result['tableCustomFieldList'] = $this->_aCustomFieldList;
        }

        return $result;

    }

    /**
     * @param string $value
     * @param string $type
     * @return string
     */
    public static function convertField($value, $type)
    {
        switch ($type) {
            case 'fa-bool':
                if ($value || $value == 1) {
                    return '<i class="fa fa-check drd-green"></i>';
                } else if (!$value || $value == 0) {
                    return '<i class="fa fa-times drd-red"></i>';
                } else {
                    return $value;
                }
            case 'to-json':
                if (is_string($value)) {
                    return $value;
                } else {
                    return json_encode($value);
                }
            case 'pretty-date':
                $dt = new DateTime($value);
                return $dt->format(TableHelper::$dateFormat);
            default:
                return $value;
        }
    }

}
