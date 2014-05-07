<?php
/**
 * Handles user registration
 */
class Register extends Controller {
    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Displays the registration form
     */
    public function index () {
        // if the user is already logged in, send them back to the main page
        Authorize::requireLoggedOut();
        $this->getFeedback();
        $this->render('login' . DS .'registrationForm');
    }
    
    /**
     * Registers a new user
     */
    public function register () {
        if ( isset($_POST['btnRegisterCancel']) ) {
            header('Location: ' . URL );
            return;
        }
        
        $model =$this->loadModel('Login');
        if ( $model->register() ) {
            Session::set(FEEDBACK_POSITIVE . "['registration']", FEEDBACK_REGISTRAION_SUCCESS);
            header('Location: ' . URL . '/login');
        } else {
            Session::set(FEEDBACK_NEGATIVE . "['registration']", FEEDBACK_REGISTRAION_FAIL);
            header('Location: ' . URL . '/register');
        }
    }
}
