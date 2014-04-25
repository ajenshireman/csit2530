use c2530a07proj;

-- statuses
insert into status ( name, description, created, edited ) 
    values ( 'Pending', 'Awaitng approval or confirmation', unix_timestamp(), unix_timestamp() );
insert into status ( name, description, created, edited ) 
    values ( 'Active', 'Active', unix_timestamp(), unix_timestamp() );
insert into status ( name, description, created, edited ) 
    values ( 'Suspended', 'Temporarily diasbled', unix_timestamp(), unix_timestamp() );
insert into status ( name, description, created, edited ) 
    values ( 'Deleted', '', unix_timestamp(), unix_timestamp() );
insert into status ( name, description, created, edited ) 
    values ( 'Review', 'Needs further Review', unix_timestamp(), unix_timestamp() );
insert into status ( name, description, created, edited ) 
    values ( 'Remove', 'Flagged for removal', unix_timestamp(), unix_timestamp() );

-- users
insert into user ( username, password, email, statusId, created, edited )
    values ( 'admin', '$2y$10$b5AHk6zCFDvSM7erNVRHU.eCOY47qTPR8EK/xzyCPEy73XtB/xZvS', 'admin@thissite.com', 
        ( select status.statusId from status where status.name = 'Active' ), 
        unix_timestamp(), unix_timestamp() );
insert into user ( username, password, email, statusId, created, edited )
    values ( 'testuser', '$2y$10$JFIPq0qKF.wg3mw4TDl4/ucIssmgoNhEFrpC1iLsXOr.zus75wRRu', 'testuser@somewhere.org', 
        ( select status.statusId from status where status.name = 'Active' ), 
        unix_timestamp(), unix_timestamp() );
insert into user ( username, password, email, statusId, created, edited )
    values ( 'Godzilla', '$2y$10$rhi3aLiivCqzjSJWOvVscuoy5AhZZQmz0tgLkGOCnQ.Fmrge5GoRO', 'biggreenandbeautiful@tokyo.jp', 
        ( select status.statusId from status where status.name = 'Active' ), 
        unix_timestamp(), unix_timestamp() );

-- roles
insert into role ( name, description, canBrowse, canDownload, canUpload, canApprove, isAdmin, created, edited ) 
    values ( 'Administrator', 'Access to all site functions', 1, 1, 1, 1, 1, unix_timestamp(), unix_timestamp() );
insert into role ( name, description, canDownload, created, edited )
    values ( 'User', 'Can browse files', 1, unix_timestamp(), unix_timestamp() );
insert into role ( name, description, canUpload, created, edited )
    values ( 'Contributer', 'Verified PSCC student or staff. Can upload apps.', 1, unix_timestamp(), unix_timestamp() );

-- add roles to users
insert into user_role ( userId, roleId, created ) 
    values ( 
        ( select userId from user where username = 'admin' ), 
        ( select roleId from role where name = 'Administrator' ), 
        unix_timestamp() );
insert into user_role ( userId, roleId, created ) 
    values ( 
        ( select userId from user where username = 'testuser' ), 
        ( select roleId from role where name = 'User' ), 
        unix_timestamp() );
insert into user_role ( userId, roleId, created ) 
    values ( 
        ( select userId from user where username = 'Godzilla' ), 
        ( select roleId from role where name = 'User' ), 
        unix_timestamp() );
insert into user_role ( userId, roleId, created ) 
    values ( 
        ( select userId from user where username = 'Godzilla' ), 
        ( select roleId from role where name = 'Contributer' ), 
        unix_timestamp() );
