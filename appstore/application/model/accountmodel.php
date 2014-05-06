<?php
/**
 * Performs CRUD operations on user accounts
 */
class AccountModel extends Model {
    /**
     * gets a list of all registered users
     * 
     * @param int $status 
     * 
     * @return array
     */
    public function getUsers ( $statusId = false ) {
        $query = "select user.userId, 
                        user.username, 
                        user.email, 
                        user.statusId,
                        status.name as status,  
                        user.created, 
                        user.edited
                    from user
                    join status on status.statusId = user.statusId";
        $query .= ( $statusId ) ? ' where user.statusId = :statusId' : ';';
        $stmnt = $this->db->prepare($query);
        $stmnt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmnt->execute(array(':statusId' => $statusId));
        
        $users = array();
        while ( $user = $stmnt->fetch() ) {
            array_push($users, $user);
        }
        return $users;
        
        return $this->resultToArray($stmnt);
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
            $query .= "  user.password, ";
        }
        $query .= "      user.email, 
                         user.statusId,
                         status.name as status, 
                         user.created, 
                         user.edited
                   from user 
                   join status on status.statusId = user.statusId
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
     * checks if a user has a certain role
     * 
     * @param int $userId user to check
     * @param string $role name of role needed
     * 
     * @return boolean
     */
    public function userInRole ( $userId, $role ) {
        $stmnt = $this->db->prepare("select user.username as User, role.name as Role
                                         from user_role
                                         join user on user.userId = user_role.userId
                                         join role on role.roleId = user_role.roleId
                                         where role.name = :roleName and user.userId = :userId;");
        $stmnt->execute(array(':roleName' => $role, ':userId' => $userId));
        return ( $stmnt->rowCount() == 1 );
    }
    
    /**
     * gets all roles assigned to a user
     * 
     * @param int $userId
     * 
     * @return array
     */
    public function getUserRoles ( $userId ) {
        $stmnt = $this->db->prepare("select role.roleId, 
                                            role.name, 
                                            role.description, 
                                            role.isAdmin
                                    from role
                                    join user_role on user_role.roleId = role.roleId
                                    join user on user.userId = user_role.userId
                                    where user.userId = :userId");
        $stmnt->setFetchMode(PDO::FETCH_CLASS, 'Role');
        $stmnt->execute(array(':userId' => $userId));
        
        $roles = array();
        while ( $role = $stmnt->fetch() ) {
            array_push($roles, $role);
        }
        
        return $roles;
    }
    
    /**
     * Assignes a role to a user
     * 
     * @param int $uesrId
     * @param int $roleId
     */
    public function placeUserInRole ( $userId, $roleId ) {
        $stmnt = $this->db->prepare("insert into user_role ( userId, roleId, created ) 
                                     values ( :userId, :roleId, :created );");
        $stmnt->execute(array(':userId' => $userId, 
                              ':roleId' => $roleId,
                              ':created' => time()
        ));
    }
    
    /**
     * Creates a new user in the database
     * 
     * @param User $newUser Registration information for the new user
     * 
     * @return User The new user, pulled from the database
     */
    public function createUser ( $newUser ) {
        // set the create date to now
        $newUser->set('created', time() );
        
        // put the user in the database
        $stmnt = $this->db->prepare("insert into user ( username, password, email, created )
                                        values ( :username, :password, :email, :created );");
        $stmnt->execute(array(
        	':username' => $newUser->get('username'),
            ':password' => $newUser->get('password'),
            ':email'    => $newUser->get('email'),
            ':created'  => time()
        ));
        
        $user = $this->getUserById($this->db->lastInsertId());
        
        $this->placeUserInRole($user->get('userId'), 2);
        
        // return the updated information from the database
        return $user;
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
                                         statusId = :statusId, 
                                         email = :email,
                                         edited = :edited
                                     where userId = :userId");
        $stmnt->execute(array(
            'userId'   => $userId,
        	'username' => $updatedUser->get('username'),
            'password' => $updatedUser->get('password'),
            'statusId' => $updatedUser->get('statusId'),
            'email'    => $updatedUser->get('email'),
            'edited'   => time()
        ));
        
        $user = $this->getUserById($userId, true);
        
        return $user;
    }
    
    /**
     * Deletes a user from the database
     * 
     * @param int $userId User to delete
     * 
     * @deprecated
     */
    public function deleteUser ( $userId ) {
         $stmnt = $this->db->prepare("delete from user where user.userId = :userId");
         print_r($stmnt->errorInfo());
       
        return;
    }
    
    /**
     * Assigns a status to a user's account
     * 
     * @param int $userId
     * @param int $statusId
     */
    public function setUserStatus ( $userId, $statusId ) {
        $newUser = new User();
        
        $newUser->set('statusId', $statusId);
        $user = $this->updateUser($userId, $newUser);
    }
    
    /**
     * rehashes the user's password
     * 
     * Checks if the password needs to be rehashed, and reshashes if needed
     * 
     * @param int $userId user who needs thier password checked
     * 
     * @return User|string updated user if success, message if not
     */
    public function rehashPassword ( $userId ) {
        // get the user's hashed password
        $user = $this->getUserById($userId, true);
        $password = $user->get('password');
        if ( password_needs_rehash($password, PASSWORD_DEFAULT) ) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $user->set('password', $password);
            return $this->updateUser($userId, $user);
        } else {
            return 'Password did not neeed rehash';
        }
    }
    
    /**
     * Sets the user's password
     * 
     * @param int $userId
     * @param string $password
     * 
     * @return boolean
     */
    public function setUserPassword ( $userId, $password ) {
        //$user = $this->getUserById($userId, true);
        $newUser = new User();
        $newUser->set('password', password_hash($password, PASSWORD_DEFAULT));
        //echo $newUser->get('password');
        $this->updateUser($userId, $newUser);
    }
    
    /**
     * Set the user's email
     * 
     * @param int $userId
     * @param string $email
     * 
     * @return boolean
     */
    public function setUserEmail ( $userId, $email ) {
        $newUser = new User();
        $newUser->set('email', $email);
        $this->updateUser($userId, $newUser);
    }
}
