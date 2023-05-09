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


