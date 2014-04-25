use c2530a07proj;

-- users
insert into user ( username, password, email, statusId, created, edited )
    values ( 'admin', '$2y$10$b5AHk6zCFDvSM7erNVRHU.eCOY47qTPR8EK/xzyCPEy73XtB/xZvS', 'admin@thissite.com', 
        ( select status.statusId from status where status.name = 'Active' ), 
        unix_timestamp(), unix_timestamp() );
insert into user ( username, password, email, statusId, created, edited )
    values ( 'testuser', '$2y$10$JFIPq0qKF.wg3mw4TDl4/ucIssmgoNhEFrpC1iLsXOr.zus75wRRu', 'testuser@somewhere.org', 
        ( select status.statusId from status where status.name = 'Active' ), 
        unix_timestamp(), unix_timestamp() );
insert into user ( username, password, email, pstcc_email, statusId, created, edited )
    values ( 'Godzilla', '$2y$10$rhi3aLiivCqzjSJWOvVscuoy5AhZZQmz0tgLkGOCnQ.Fmrge5GoRO', 'biggreenandbeautiful@tokyo.jp', 'godzilla@pstcc.edu', 
        ( select status.statusId from status where status.name = 'Active' ), 
        unix_timestamp(), unix_timestamp() );

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
