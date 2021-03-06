<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends Public_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));

	}
	
	
	public function index() {
        if ($this->isLoggedIn()) {
            redirect(base_url());
        } else {
            $this->renderLoginPage();
        }
	}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {

        if ($this->isLoggedIn()) {
            redirect(base_url());
        } else {
            // create the data object
            $data = new stdClass();

            // load form helper and validation library
            $this->load->helper('form');
            $this->load->library('form_validation');

            // set validation rules
            $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[3]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');

            if ($this->form_validation->run() === false) {

                // validation not ok, send validation errors to the view
                $this->renderRegisterPage(validation_errors());

            } else {

                // set variables from the form
                $username = $this->input->post('username');
                $email    = $this->input->post('email');
                $password = $this->input->post('password');

                if ($this->user_model->create_user($username, $email, $password)) {

                    // user creation ok
                    $this->renderLoginPage('User created');

                } else {

                    // user creation failed, this should never happen
                    $data->error = 'There was a problem creating your new account. Please try again.';

                    $this->renderRegisterPage($data->error);

                }

            }
        }
	}
		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {

		if ($this->isLoggedIn()) {
            redirect(base_url());
        } else {
            // create the data object
            $data = new stdClass();

            // load form helper and validation library
            $this->load->helper('form');
            $this->load->library('form_validation');

            // set validation rules
            $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == false) {

                // validation not ok, send validation errors to the view
                $this->renderLoginPage('Validation not ok');

            } else {

                // set variables from the form
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                if ($this->user_model->resolve_user_login($username, $password)) {

                    $user_id = $this->user_model->get_user_id_from_username($username);
                    $user    = $this->user_model->get_user($user_id);

                    // set session user datas
                    $_SESSION['user_id']      = (int)$user->id;
                    $_SESSION['username']     = (string)$user->username;
                    $_SESSION['logged_in']    = (bool)true;
                    $_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
                    $_SESSION['is_admin']     = (bool)$user->is_admin;
                    $_SESSION['avatar']       = (string)$user->avatar;
                    
                    // set additional data
                    $oPerson = $this->person_model->byUserId($user->id);
                    $_SESSION['person']       = $oPerson;

                    // user login ok

                    redirect(base_url());

                } else {

                    // login failed
                    $data->error = 'Wrong username or password.';

                    // send error to the view
                    $this->renderLoginPage($data->error);
                }
            }
        }
		

		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
            $this->renderPage('user/login',[
                'error' => 'logged out'
            ],false,false,false);

		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect(base_url());
			
		}
		
	}
	
}
