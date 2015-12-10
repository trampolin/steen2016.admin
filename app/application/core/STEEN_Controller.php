<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 13.10.15
 * Time: 21:10
 */

require_once APPPATH . 'third_party/community_auth/core/Auth_Controller.php';

class STEEN_Controller extends Auth_Controller
{

    public $bIsAjaxRequest;

    public function __construct()
    {
        parent::__construct();

        // store if it's ajax request
        $this->bIsAjaxRequest = $this->input->is_ajax_request();
    }


    /**
     * @param $sView
     * @param array $aData
     * @param bool|true $bRenderMenu
     * @param bool|true $bRenderTopRow
     * @param bool|true $bRenderFooter
     */
    protected function renderPage($sView, $aData = [], $bRenderMenu = true, $bRenderTopRow = true, $bRenderFooter = true)
    {
        $this->load->view('partials/main/header', [
            'bRenderMenu' => $bRenderMenu,
            'bRenderTopRow' => $bRenderTopRow
        ]);

        $this->load->view($sView, $aData);

        $this->load->view('partials/main/footer', [
            'sJsInclude' => $sView,
            'bRenderFooter' => $bRenderFooter
        ]);
    }
}