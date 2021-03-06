<?php
/**
 * The User class
 * 
 * holds informatino for a single user
 */
class User extends DatabaseObject {
    protected $userId;
    protected $username;
    protected $password;
    protected $email;
    protected $statusId;
    protected $status;
    protected $created;
    protected $edited;
    
    /**
     * updates the user with new information
     * 
     * @param User $newUser the new user information
     * 
     * @return User A user with updated information
     */
    public function update ( $newUser ) {
        $updatedUser = new User();
        $updatedUser->set('userId', $this->userId);
        $updatedUser->set('username', ( $newUser->get('username') != null ) ? 
                $newUser->get('username') : $this->username );
        $updatedUser->set('password', ( $newUser->get('password') != null ) ? 
                $newUser->get('password') : $this->password );
        $updatedUser->set('email', ( $newUser->get('email') != null ) ? 
                $newUser->get('email') : $this->email );
        $updatedUser->set('statusId', $newUser->get('statusId') != null ?
                $newUser->get('statusId') : $this->statusId );
        $updatedUser->set('status', $newUser->get('status') != null ?
                $newUser->get('status') : $this->status );
        $updatedUser->set('created', $this->created);
        $updatedUser->set('edited', time());
        
        return $updatedUser;
    } 
    
}
