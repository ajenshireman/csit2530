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
     *  [0:]: url to return to
     */
    public function setStatus ( $parameters ) {
        $userId = $_POST['inputUserId'];
        $statusId = $_POST['inputStatusId'];
        $returnPage = '/overview';
        if ( isset($parameters) ) {
            $returnPage = '';
            for ( $i = 0; $i < count($parameters); $i++ ) {
                $returnPage .= '/' . $parameters[$i];
            }
        }
        $model = $this->loadModel('Account');
        $model->setUserStatus($userId, $statusId);
        header('Location: ' . URL . $returnPage);
    }
}