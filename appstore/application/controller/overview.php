<?php
class Overview extends Controller {
    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Shows a list of all registered users
     */
    public function index () {
        $model = $this->loadModel('Account');
        $this->users = $model->getUsers();
        $this->render('overview/index');
    }
    
    /**
     * Shows the details for a user
     * 
     * @param array $parameters [0] must be the userId
     */
    public function showUserDetails ( $parameters = array() ) {
        if ( isset($parameters[0]) ) {
            $userId = $parameters[0];
        } else {
            // No user specified
        }
        
        $model = $this->loadModel('Account');
        $this->user = $model->getUserById($userId);
        $this->render('overview/userdetails');
    }
}