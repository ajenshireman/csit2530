<?php
/**
 * Performs CRUD operations on user accounts
 */
class AccountModel extends Model {
    /**
     * Constructor
     */
    public function __construct( $database ) {
        parent::__construct($database);
    }
    
    /**
     * Shows a list of all registered users
     * 
     * @return array
     */
    public function getUsers () {
        $stmnt = $this->db->prepare("select user.userId, 
                                            user.username, 
                                            user.email, 
                                            user.created, 
                                            user.edited
                                        from user");
        $stmnt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmnt->execute();
        
        $users = array();
        while ( $user = $stmnt->fetch() ) {
            array_push($users, $user);
        }
        return $users;
    }
    
    /**
     * Gets the information for a single user
     * 
     * @param int $userId
     * 
     * @return User $user
     */
    public function getUserById ( $userId ) {
        $stmnt = $this->db->prepare("select user.userId,
                                            user.username, 
                                            user.email, 
                                            user.created, 
                                            user.edited
                                        from user 
                                        where user.userId = :userId;");
        $stmnt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmnt->execute(array(':userId' => $userId));
        
        if ( $stmnt->rowCount() == 1 ) {
            return $stmnt->fetch();
        } else {
            // ERROR
        }
    }
    
    /**
     * Creates a new user in the database
     * 
     * @param User $newUser Registration information for the new user
     * 
     * @return User The new user, pulled from the database
     */
    public function createUser ( $newUser ) {
        // Hash the user's password
        // $newUser->set('password', password_hash($newUser->get('password'), PASSWORD_DEFAULT)));
        
        // set the create date to now
        $newUser->set('created', time() );
        
        // put the user in the database
        $stmnt = $this->db->prepare("insert into user ( username, password, email, created )
                                        values ( :username, :password, :email, :created );");
        $stmnt->execute(array(
        	':username' => $newUser->get('username'),
            ':password' => $newUser->get('password'),
            ':email'    => $newUser->get('email'),
            ':created'  => $newUser->get('created')
        ));
        
        //print_r($stmnt->errorInfo());
        
        // return the updated information from the database
        return $this->getUserById($this->db->lastInsertId());
    }
    
    /**
     * Updates a user's information
     * 
     * @param int $userId User to update
     * @param User $newUser Updated information
     * 
     * @return User The updated user information pulled from the database
     */
    public function updateUser( $userId, $newUser ) {
        
    }
    
    /**
     * Deletes a user from the database
     * 
     * @param int $userId User to delete
     */
    public function deleteUser ( $userId ) {
        
    }
}
