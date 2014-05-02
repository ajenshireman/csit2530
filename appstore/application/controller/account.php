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
    
    /**
     * show the form to change the user's avatar
     */
    public function changeAvatar () {
        $model = $this->loadModel('Account');
        $this->user = $model->getUserById($_SESSION['userId']);
        $this->render('account/avatarUploadForm');
    }
    
    /**
     * change the user's avatar
     */
    public function updateavatar () {
        $model = $this->loadModel('Account');
        $this->user = $model->getUserById($_SESSION['userId']);
        
        if ( !isset($_FILES) ) {
            // no file selected
            //header('Location: ' . URL . '/account');
            echo 'No file selected';
            return;
        }
        $file = $_FILES['uploadAvatarImage'];
        $imageInfo = getimagesize($file['tmp_name']);
        if ( $imageInfo == 0 ) {
            // not an image
            //header('Location: ' . URL . '/account');
            echo 'Not an image';
            return;
        }
        $imageType = $imageInfo[2];
        
        switch ( $imageType ) {
        	case IMAGETYPE_JPEG:
        	case IMAGETYPE_GIF:
        	case IMAGETYPE_PNG:
        	    break;
        	default:
        	    // invalid image type
        	    //header('Location: ' . URL . '/account');
        	    echo 'invalid image type';
        	    break;
        }
        $location = AVATAR_PATH . $this->user->get('userId');
        if ( move_uploaded_file($file['tmp_name'], $location) ) {
            header('Location: ' . URL . '/account');
            echo 'file location: ' . $location;
        } else {
            echo "upload error";
        }
    }
}