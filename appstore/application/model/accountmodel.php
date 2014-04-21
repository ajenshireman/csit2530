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
     * @param boolean $fetch_password if true get the user's password, defaut false
     * 
     * @return User $user
     */
    public function getUserById ( $userId, $fetch_password = false ) {
        $query = "select user.userId,
                        user.username,";
        if ( $fetch_password ) {
            $query .= " user.password, ";
        }
        $query .= "     user.email, 
                        user.created, 
                        user.edited
                   from user 
                   where user.userId = :userId;";
        $stmnt = $this->db->prepare($query);
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
        $existingUser = $this->getUserById($userId, true);
        $updatedUser = $existingUser->update($newUser);
        $stmnt = $this->db->prepare("update user 
                                     set username = :username, 
                                         password = :password,
                                         email = :email,
                                         edited = :edited
                                     where userId = :userId");
        $stmnt->execute(array(
            'userId'   => $userId,
        	'username' => $updatedUser->get('username'),
            'password' => $updatedUser->get('password'),
            'email'    => $updatedUser->get('email'),
            'edited'   => time()
        ));
        
        return $this->getUserById($userId, true);
    }
    
    /**
     * Deletes a user from the database
     * 
     * @param int $userId User to delete
     */
    public function deleteUser ( $userId ) {
        
    }
    
    /**
     * rehashes the user's password
     * 
     * Checks if the password needs to be rehashed, and reshashes if needed
     * 
     * @param int $userId user whi needs thier password checked
     * 
     * @return boolean true if success
     */
    public function rehashPassword ( $userId ) {
        // get the user's hashed password
        $user = $this->getUserById($userId, true);
        $password = $user->get('password');
        if ( password_needs_rehash($password, PASSWORD_DEFAULT) ) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $user->set('password', $password);
            if ( $this->updateUser($userId, $user) ) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
