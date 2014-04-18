<?php
class Overview extends Controller {
    /**
     * Shows a list of all registered users
     */
    public function index () {
        $model = $this->loadModel('Overview');
        $this->users = $model->getUsers();
        $this->render('overview/index');
    }
    
    /**
     * Shows the details for a user
     * 
     * @param int $userId
     */
    public function showUserDetails ( $parameters = array() ) {
        if ( isset($parameters[0]) ) {
            $userId = $parameters[0];
        } else {
            // No user specified
        }
        
        $model = $this->loadModel('Overview');
        $this->user = $model->getUserDetails($userId);
        $this->render('overview/userdetails');
    }
}