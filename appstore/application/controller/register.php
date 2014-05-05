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
        
        $this->render('login' . DS .'registrationForm');
    }
    
    /**
     * Registers a new user
     */
    public function register () {
        $model =$this->loadModel('Login');
        if ( $model->register() ) {
            header('Location: ' . URL . '/overview');
        } else {
            echo 'Registration Failed';
        }
    }
}
