<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 13.10.15
 * Time: 21:10
 */
class STEEN_Controller extends CI_Controller {

    public $bIsAjaxRequest;

    public function __construct() {
        parent::__construct();

        // store if it's ajax request
        $this->bIsAjaxRequest = $this->input->is_ajax_request();
    }

    /**
     * @param string $sView
     * @param array $aData
     * @param bool $bRenderFull
     */
    protected function response($sView,$aData = [],$bRenderFull = true) {
        if ($bRenderFull) {
            $this->load->view('partials/main/header');
        }

        $this->load->view($sView,$aData);

        if ($bRenderFull) {
            $this->load->view('partials/main/footer');
        }
    }
}