<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.12.15
 * Time: 21:11
 */

class User extends Public_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->jsonOutput('Für diese aktion müssen Sie eingeloggt sein',false);
    }
}