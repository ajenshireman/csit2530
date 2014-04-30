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
        $model = $this->loadModel('Account');
        $this->user = $model->getUserById($_SESSION['userId']);
        $this->render('account/main');
    }
    
    /**
     * Change a user's status
     * 
     * @param array:
     *  [0]: userId
     *  [1]: statusId
     *  [2:]: url to return to
     */
    public function setStatus ( $parameters ) {
        $userId = $parameters[0];
        $statusId = $parameters[1];
        $returnPage = '/overview';
        if ( count($parameters) > 2 ) {
            $returnPage = '/';
            for ( $i = 2; $i < count($parameters); $i++ ) {
                $returnPage += $parameters;
            }
        }
        $model = $this->loadModel('Account');
        $model->setUserStatus($userId, $statusId);
        
        header('Location: ' . URL . $returnPage);
    }
}