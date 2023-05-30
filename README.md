# Smart Working Calendar.

## TODO.
### evidenziare click per inserimento 

## Set admin profiles, to enable administrative features.

``
1) get the users list belonging to admins
  select userid from users where grp in (select id from `groups` where `name` = 'admin');

2) get the role id of admin
  select id from roles where `name` ='admin';

3) insert one record in profiles foreach users found
  insert into profiles (roleid, userid) values (4, 6);

``
## Fix colors, when updating default_color in users table
``
update events set evt_bg = (select default_color from users where users.userid = events.userid);
``
## List all admins
select users.username, users.userid, `groups`.name, `groups`.id from profiles join users on profiles.userid = users.userid and roleid in (select id from roles where name like 'admin') join `groups` on users.grp = `groups`.id;

