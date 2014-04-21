<?php
class Account extends Controller {
    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    
        Authorize::requireLogin();
    }
    
    public function index () {
        header('Location: ' . URL);
    }
    
    /**
     * Deletes a user
     * 
     * @param array [0] must be usrId
     */
    public function delete ( $parameters ) {
        $userId = $parameters[0];
        $this->model = $this->loadModel('Account');
        if ( ( $_SESSION['userId'] == $userId ) || 
             ( $this->model->userInRole($_SESSION['userId'], 'Administrator') ) 
        ) {
            $this->model->deleteUser($userId);
            header('Loaction: ' . URL . 'overview');
        } else {
            header('Location: ' . URL);
        }
    }
}