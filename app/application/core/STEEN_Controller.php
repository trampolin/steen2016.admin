<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 13.10.15
 * Time: 21:10
 */


abstract class STEEN_Controller extends CI_Controller
{

    protected $bIsAjaxRequest;

    protected $minAuthLevel;

    public function __construct()
    {
        parent::__construct();

        // store if it's ajax request
        $this->bIsAjaxRequest = $this->input->is_ajax_request();
    }

    /**
     * @return bool
     */
    protected function isLoggedIn() {
        return $this->user_model->isLoggedIn();
    }

    protected function redirectLogin() {
        redirect(base_url().'user/login');
    }

    protected function renderLoginPage($error = '') {
        $this->renderPage('user/login',[
            'error' => $error
        ],false,false,false);
    }

    protected function renderRegisterPage($error = '') {
        $this->renderPage('user/register',[
            'error' => $error
        ],false,false,false);
    }

    protected function jsonOutput($data,$bSuccess = true) {
        $aResponse = [
            'data' => $data,
            'success' => $bSuccess
        ];

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($aResponse));
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