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

-- roles
insert into role ( name, description, canBrowse, canDownload, canUpload, canApprove, isAdmin, created, edited ) 
    values ( 'Administrator', 'Access to all site functions', 1, 1, 1, 1, 1, unix_timestamp(), unix_timestamp() );
insert into role ( name, description, canDownload, created, edited )
    values ( 'User', 'Can browse files', 1, unix_timestamp(), unix_timestamp() );
insert into role ( name, description, canUpload, created, edited )
    values ( 'Contributer', 'Verified PSCC student or staff. Can upload apps.', 1, unix_timestamp(), unix_timestamp() );
