# Smart Working Calendar.

# DB Administration

## Profiles management

### List all admins
select users.username, users.userid, `groups`.name, `groups`.id from profiles join users on profiles.userid = users.userid and roleid in (select id from roles where name like 'admin') join `groups` on users.grp = `groups`.id;

### Add admin privileges to an username
insert into profiles (userid, roleid) values ((select userid from users where username like '<username>' limit 1), (select id from roles where name like 'admin' limit 1));

### Remove admin privileges from an username
delete from profiles where userid in (select userid from users where username like '<username>');

## UI Issues

### Fix colors, after updating default_color of one or more users in the users table
``
update events set evt_bg = (select default_color from users where users.userid = events.userid);
``
