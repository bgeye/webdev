--1
insert into task(user_id,status_id,title,description,duration,duedate)
values(8,1,'Aufgabe 6','Löse sie...:-)',30,curdate());

select * from task t where t.duedate = curdate();

--2
insert into status(name, display_name)
values('forgot','vergessen');

select * from status;

--3
insert into user(username, password, name, lastname)
values('rolf@web-professionals.ch','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4','Rolf','Eggenberger');

select * from user u
order by u.id desc;

--4
delete from task where duration < 2 or duration > 600; --only that one is running in mysql :-)

delete from task t
where t.id in (select t.id from task t
where t.duration < 2 or t.duration > 600);

--5
update task t
set t.user_id = NULL, t.updated = curdate()
where t.id in(select t.id from task t, user u
where u.name = 'Max'
and u.lastname = 'Mustermann'
and t.user_id = u.id);


delete from user u
where u.name = 'Max'
and u.lastname = 'Mustermann';

--6
update task t
set t.user_id = (select u.id from user u where u.name = 'Rolf' and u.lastname = 'Eggenberger'), t.updated = curdate()
where t.user_id in(10,11,12,13);

--7
update task t
set    t.status_id = (select s.id from status s where s.name = 'forgot'), t.updated = curdate()
where  t.status_id in (select s.id from status s where s.name = 'in_progress')
and    YEAR(t.duedate) < 2017;

--8
update taskt t
set t.status_id = (select s.id from status s where s.name = 'done'), t.updated = curdate()
where t.title = 'Aufgabe 6';