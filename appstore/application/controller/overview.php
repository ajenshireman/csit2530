<?php
class Overview extends Controller {
    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        
        Authorize::requireLogin();
    }
    
    /**
     * Shows a list of all registered users
     */
    public function index () {
        $this->model = $this->loadModel('Account');
        $this->users = $this->model->getUsers();
        $this->render('overview' . DS .'index');
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
        
        $this->model = $this->loadModel('Account');
        $this->user = $this->model->getUserById($userId);
        $this->userRoles = $this->model->getUserRoles($userId);
        $this->render('overview' . DS .'userdetails');
    }
    
    /**
     * Rehashes the user's password
     * 
     * @param array $parameters [0] must be the userId
     */
    public function rehashPassword ( $parameters ) {
        if ( isset($parameters[0]) ) {
            $userId = $parameters[0];
        } else {
            // No user specified
        }
        
        $model = $this->loadModel('Account');
        $this->user = $model->rehashPassword($userId);
        if ( get_class($this->user) == 'User') {
            $this->render('overview' . DS .'rehashSuccess');
        } else {
            $this->render('overview' . DS .'rehashFail');
        }
    }
}