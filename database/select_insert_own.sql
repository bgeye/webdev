insert into User(username,password,name,lastname)
values('nisa','test1234','Nicole','Staub');

insert into status(name,display_name)
	values('on_hold','Warten');

insert into task(user_id,status_id,title,description,duration,duedate)
	values(1,3,'Milch','Milch in Migros holen',15,'2018-03-25')

update task t
set t.`duedate` = '2018-03-25'
where t.id = 10;


select t.id,t.title, t.description, t.duedate, u.name, u.lastname, s.display_name from task t, user u, status s
where t.user_id = u.id
and t.status_id = s.id;


select * from status;
select * from task;
select * from user;