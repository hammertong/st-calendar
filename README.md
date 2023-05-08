# ST presence calendar 

## TODO

### filtro 
``
	$('.calRowEvt').each(function(o) { console.log(o); })
``
### evidenziare click per inserimento 

### export excel del mese
``         
          01 02 03 04 ... 30 31 
username1  x  x     x  
username2
username3
...

``

## Updating admin profiles

``
1) get the users list belonging to admins
  select userid from users where grp in (select id from `groups` where `name` = 'admin');

2) get the role id of admin
  select id from roles where `name` ='admin';

3) insert one record in profiles foreach users found
  insert into profiles (roleid, userid) values (4, 6);

``


