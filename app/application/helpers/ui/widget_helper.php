<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.01.16
 * Time: 00:18
 */

class Widget {

    public $id;
    public $title;
    public $viewPath;
    public $viewData;

    function __construct($id, $title, $viewPath, $viewData = []) {
        $this->id = $id;
        $this->title = $title;
        $this->viewPath = $viewPath;
        $this->viewData = $viewData;
    }

    public function getData() {
        return [
            'widgetId' => $this->id,
            'widgetTitle' => $this->title,
            'widgetViewPath' => $this->viewPath,
            'widgetViewData' => $this->viewData
        ];
    }
}

class WidgetColumn {
    /**
     * @var Widget[] $aWidgets
     */
    public $aWidgets;

    function __construct() {
        $this->aWidgets = [];
    }

    /**
     * @param Widget $oWidget
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