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
        $location = AVATAR_UPLOAD_PATH . $this->user->get('userId');
        if ( move_uploaded_file($file['tmp_name'], $location) ) {
            header('Location: ' . URL . '/account');
            echo 'file location: ' . $location;
        } else {
            echo "upload error";
        }
    }
    
    /**
     * shows the form to change a user's password
     */
    public function changePassword () {
        //$this->errors = Session::get('errors');
        $this->getFeedback();
        $model = $this->loadModel('Account');
        $this->render('account/passwordChangeForm');
    }
    
    /**
     * changes the user's password
     */
    public function updatePassword () {
        // make sure a fields are filled out
        if ( !isset($_POST['currentPassword']) ) {
            $errors['currentPassword'] = FEEDBACK_PASSWORD_EMPTY;
        }
        if ( !isset($_POST['newPassword']) || strlen($_POST['newPassword']) == 0 ) {
            $errors['newPassword'] = FEEDBACK_PASSWORD_NEW_EMPTY;
        }
        if ( !isset($_POST['confirmPassword']) || $_POST['newPassword'] != $_POST['confirmPassword'] ) {
            $errors['confirmPassword'] = FEEDBACK_PASSWORD_MISMATCH;
        }
        if ( isset($errors) ) { 
            Session::set(FEEDBACK_NEGATIVE, $errors); 
            header('Location: ' . URL . '/account/changepassword');
            return;
        }
        
        // collect post variables
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $userId = $_SESSION['userId'];
        
        // vaidate the currentPassword
        $loginModel = $this->loadModel('Login');
        if ( $loginModel->verifyUserPassword($currentPassword, $userId) ) {
            // password correct, update the password
            $accountModel = $this->loadModel('Account');
            $accountModel->setUserPassword($userId, $newPassword);
            Session::set(FEEDBACK_POSITIVE, FEEDBACK_PASSWORD_CHANGE_SUCCESS);
            $loginModel->logout();
            $this->render('account/passwordchanged');
        } else {
            $errors['currentPassword'] = FEEDBACK_PASWORD_INCORRECT;
            Session::set(FEEDBACK_NEGATIVE, $errors);
            header('Location: ' . URL . '/account/changepassword');
        }
    }
}