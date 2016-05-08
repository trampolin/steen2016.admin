<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.01.16
 * Time: 00:18
 */

class SteenWidget {

    public $id;
    public $title;
    public $viewPath;
    public $viewData;
    
    public $headerIncludeList;

    //public $searchRoute;

    public $template;

    public $icon;

    protected $_ci;

    function __construct($id, $title, $viewPath, $viewData = []) {
        $this->id = $id;
        $this->title = $title;
        $this->viewPath = $viewPath;
        $this->viewData = $viewData;

        $this->icon = 'fa-table';

        $this->wrapper = 'partials/modules/widget_wrapper';
        
        $this->headerIncludeList = new WidgetHeaderIncludeList($id);

        $this->_ci =& get_instance();
    }

    public function getData() {
        return [
            'widgetId' => $this->id,
            'widgetTitle' => $this->title,
            'widgetViewPath' => $this->viewPath,
            'widgetViewData' => $this->viewData,
            'widgetIcon' => $this->icon,
            'widgetHeaderIncludeList' => $this->headerIncludeList
            //'widgetSearchRoute' => $this->searchRoute
        ];
    }

    public function render($output = false) {
        return $this->_ci->load->view($this->wrapper,$this->getData(),$output);
    }
}

class WidgetColumn {
    /**
     * @var SteenWidget[] $aWidgets
     */
    public $aWidgets;

    function __construct() {
        $this->aWidgets = [];
    }

    /**
     * @param SteenWidget $oWidget
     */
    public function addWidget($oWidget) {
        $this->aWidgets[] = $oWidget;
    }

    /**
     * @return array
     */
    public function getData() {

        $data = [];

        foreach ($this->aWidgets as $widget) {
            $data[] = $widget->getData();
        }

        return $data;

    }
}

class WidgetPage {

}