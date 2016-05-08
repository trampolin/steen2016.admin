<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 07.05.16
 * Time: 12:48
 */

class WidgetHeaderSearchInclude extends WidgetHeaderInclude {

    public $type;
    public $connectType;
    public $connectTargetId;

    public function __construct($type,$connectType,$connectTargetId) {
        parent::__construct('partials/modules/widget/header_include_search');
        $this->type = $type;
        $this->connectType = $connectType;
        $this->connectTargetId = $connectTargetId;

        $this->id = 'search-' . $type . '-' . $connectType . '-' . $connectTargetId;
    }

    public function getData() {
        return [
            'widgetHeaderIncludeId' => $this->id,
            'widgetHeaderIncludeType' => $this->type,
            'widgetHeaderIncludeConnectType' => $this->connectType,
            'widgetHeaderIncludeConnectTargetId' => $this->connectTargetId
        ];
        // TODO: Implement getData() method.
    }
}