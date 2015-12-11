<?php

class ModalWindow
{
    public $id;
    public $title = 'Title';
    public $subTitle = null;
    public $size = 'modal-lg';
    public $dataAttribute = null;
    public $ajaxRoute = null;
    public $loadFunctionName = null;
    public $icon = null;
    public $editable = true;
    public $new = true;

    function __construct($id) {
        $this->id = $id;
    }

    public function getData() {
        return [
            'modalId' => $this->id,
            'modalEditable' => $this->editable,
            'modalNew' => $this->new,
            'modalTitle' => $this->title,
            'modalSubTitle' => $this->subTitle,
            'modalSize' => $this->size,
            'modalDataAttribute' => $this->dataAttribute,
            'modalAjaxRoute' => $this->ajaxRoute,
            'modalLoadFunctionName' => $this->loadFunctionName
        ];
    }

}
