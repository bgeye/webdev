--1
select * from user u
order by u.lastname LIMIT 8;

--2
select u.name from user u
where LEN(u.name) = 5;

--3a
select * from task t
order by t.duedate asc LIMIT 1000;

--3b
select * from task t
where t.id > 500 and t.id < 1501;

--4
select t.id, t.title, u.name, u.lastname, t.duedate from task t, user u
where t.user_id = u.id;

select t.id, t.title, u.name, u.lastname, t.duedate
from task t
INNER JOIN user u
on t.user_id = u.id;


--5
select t.id, t.title, s.display_name
where t.status_id = s.id;

select t.id, t.title, s.display_name
from task t
inner join status s
where t.status_id = s.id;

--6
select u.name, u.lastname,count(t.id) as Anzahl_Task from task t, user u
where t.user_id = u.id
group by u.`name`;

select u.name, u.lastname, (select count(*) from task t where u.id=t.user_id) as anzahlTasks from user u










