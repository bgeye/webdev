--1
select count(*) from task t
where t.`description` is null; --346

--2
select u.name, u.lastname, u.username from user u;

--3
select * from task t
where t.description like '%drei%';

--4
select count(t.title) from task t;/*11479*/
select distinct count(t.title) from task t;/*keine Duplikate*/

--5
select t.* from status s, task t
where s.name = 'done'
and t.`status_id` = s.id;

--6
select * from task t
order by t.`duedate` asc;

--7
select * from task t
where YEAR(t.duedate) = 2017;

--8
select t.* from task t, status s
where s.`name` in ('open','in_progress')
and t.`status_id` = s.`id`
and t.duedate < curdate()
order by t.`duedate` asc;