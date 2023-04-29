update events set userid = (select userid from users where username like 'zuin' limit 1) where evt_text like '%zuin%';
update events set userid = (select userid from users where username like 'piazza' limit 1) where evt_text like '%piazza%';
update events set userid = (select userid from users where username like 'montini' limit 1) where evt_text like '%montini%';
update events set userid = (select userid from users where username like 'bruzzese' limit 1) where evt_text like '%bruzzese%';
update events set userid = (select userid from users where username like 'castellaro' limit 1) where evt_text like '%castellaro%';
