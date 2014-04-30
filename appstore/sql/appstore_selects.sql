use c2530a07proj;

-- get user info
select user.userId, 
       user.username, 
       user.password, 
       user.email, 
       user.pstcc_email as pstccEmail, 
       user.statusId,
       status.name as status,  
       user.created, 
       user.edited 
    from user
    join status on status.statusId = user.statusId;

-- get user info + status
select user.userId, 
       user.username, 
       user.password, 
       user.email, 
       user.pstcc_email as pstccEmail, 
       user.statusId, 
       status.name as status, 
       user.created, 
       user.edited 
    from user
    join status on user.statusId = status.statusId;

-- show permissions for all users
select user.username,  
       sum(role.canBrowse) as canBrowse, 
       sum(role.canDownload) as canDownload, 
       sum(role.canUpload) as canUpload, 
       sum(role.canApprove) as canApprove, 
       sum(role.isAdmin) as isAdmin 
    from user 
    join user_role on user_role.userId = user.userid 
    join role on role.roleId = user_role.roleId 
    group by user.userId;

-- show latest login for all users


-- get user info + permissions
select user.userId, 
       user.username, 
       user.password, 
       user.email, 
       user.pstcc_email as pstccEmail, 
       user.statusId, 
       status.name as status, 
       sum(role.canBrowse) as canBrowse, 
       sum(role.canDownload) as canDownload, 
       sum(role.canUpload) as canUpload, 
       sum(role.canApprove) as canApprove, 
       sum(role.isAdmin) as isAdmin, 
       user.created, 
       user.edited 
    from user 
    join status on user.statusId = status.statusId
    join user_role on user_role.userId = user.userid 
    join role on role.roleId = user_role.roleId 
    group by user.userId;

-- user info + permissions + most recent login

