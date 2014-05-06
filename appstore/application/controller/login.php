<?php
/**
 * Handles user login and registration
 */
class Login extends Controller {
    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Show the login form
     */
    public function index () {
        // if the user is already logged in, send them back to the main page
        Authorize::requireLoggedOut();
        $this->getFeedback();
        $this->render('login/loginForm');
    }
    
    /**
     * proceses a login attemp login through the login form
     */
    public function login() {
        // make sure the user has entered a username and password
        if ( !isset($_POST['loginUsername']) || empty($_POST['loginUsername']) ) {
            $FEEDBACK_NEGATIVE['username'] = FEEDBACK_USERNAME_EMPTY;
        }
        if ( !isset($_POST['loginPassword']) || empty($_POST['loginPassword']) ) {
            $FEEDBACK_NEGATIVE['password'] = FEEDBACK_PASSWORD_EMPTY;
        }
        if ( isset($FEEDBACK_NEGATIVE) ) {
            Session::set(FEEDBACK_NEGATIVE, $FEEDBACK_NEGATIVE);
            header('Location: ' . URL . '/login');
        }
        
        $model = $this->loadModel('Login');
        if ( $model->login() ) {
            $FEEDBACK_POSITIVE['login'] = FEEDBACK_LOGIN_SUCCESS;
            // redirect to main page? or previous page
            header('Location: ' . URL );
        } else {
            // show the login form again
            $FEEDBACK_NEGATIVE['login'] = FEEDBACK_LOGIN_FAIL;
            Session::set(FEEDBACK_NEGATIVE, $FEEDBACK_NEGATIVE);
            header('Location: ' . URL . '/login');
        }
    }
    
    /**
     * logs the user out
     */
    public function logout () {
        $model = $this->loadModel('Login');
        $model->logout();
        header('Location: ' . URL);
    }
}
