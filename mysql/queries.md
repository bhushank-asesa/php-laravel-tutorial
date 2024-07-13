# MySQL Sample Queries

## Join

### Left Join

```bash
SELECT m.\*,u.name,s.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id
```

## Aggregate Functions with having

```bash
SELECT sum(m.out_of) out_of_sum,sum(m.marks) total_marks, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id
```

```bash
SELECT max(m.marks) max_marks, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id
```

```bash
SELECT sum(m.out_of) out_of_sum,sum(m.marks) total_marks, round((sum(m.marks)/sum(m.out_of))\*100,2) percentage, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id having percentage > 60;
```

```bash
SELECT min(m.marks) min_marks, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id
```

## Calculation

```bash
SELECT sum(m.out_of) out_of_sum,sum(m.marks) total_marks, round((sum(m.marks)/sum(m.out_of))\*100,2) percentage, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id
```

```bash
SELECT sum(m.out_of) out_of_sum,sum(m.marks) total_marks, round((sum(m.marks)/sum(m.out_of))\*100,2) percentage, upper( u.name) upper_name,lower(u.name) lower_name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id having percentage > 60
```

## Date function

```bash
SELECT birthdate, NAME, id, CONCAT(YEAR(CURDATE()), '-', YEAR(birthdate),'-',(RIGHT(CURDATE(), 5) < RIGHT(birthdate, 5))) AS formula, YEAR(CURDATE()) - YEAR(birthdate) - (RIGHT(CURDATE(), 5) < RIGHT(birthdate, 5)) AS age FROM users;
```

## If

```bash
select *, "pass" as result from marks;
```

```bash
SELECT *, IF((marks/out_of *100) >= 35, "pass", "fail") AS result FROM marks;
```

```bash
SELECT sum(marks) all_marks,sum(out_of) all_out_of,(sum(marks)/sum(out_of) *100) percentage, IF((sum(marks)/sum(out_of) *100) >= 35, "pass", "fail") AS result, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id
```

```bash
SELECT sum(marks) all_marks,sum(out_of) all_out_of,(sum(marks)/sum(out_of) *100) percentage, IF((sum(marks)/sum(out_of) *100) >= 35, "pass", "fail") AS result, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id order by percentage desc LIMIT 3
```

## Limit offset

```bash
SELECT sum(marks) all_marks,sum(out_of) all_out_of,(sum(marks)/sum(out_of) *100) percentage, IF((sum(marks)/sum(out_of) *100) >= 35, "pass", "fail") AS result, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id order by percentage desc LIMIT 1,3
```

### where

```bash
select _ from users where name is not null
select _ from users where name is null
select _ from users where name like '%hu%'
select _ from users where name not like '%hu%'
select _ from users where month(birthdate) BETWEEN 1 and 6
select _ from users where month(birthdate) not BETWEEN 6 and 10
select _ from users where month(birthdate) > 6
select _ from users where month(birthdate) >= 6
select _ from users where month(birthdate) in( 6,7)
select _ from users where month(birthdate) not in( 6,7)
```

## Distinct

```bash
select DISTINCT(out_of) from marks
```

## copy from another tabel

```bash
insert into users_2 (name,email, birthdate) select name,email, birthdate from users
```

## Union same column needed

```bash
SELECT id, name,birthdate,email
FROM users
UNION
SELECT id, name,birthdate,email
FROM users_2;
```

## Create View

### Create

```bash
create view markslist as select m.\*,u.name as username,s.name as subjectname FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id
```

### Call

```bash
SELECT \* FROM markslist
```

## Trigger

### Definition

```bash
BEGIN
IF OLD.birthdate != NEW.birthdate THEN
INSERT INTO log (table_name, column_name, old_val, new_val)
VALUES ('users', 'birthdate', OLD.birthdate, NEW.birthdate);
END IF;
END;
```

## Procedure

### Create Procedure in PHPMYADMIN

1. procedure => routine->create_new routine

## Definition

```bash
BEGIN
SELECT m.marks, m.out_of,s.name subject_name,u.name as username
FROM marks m
LEFT JOIN subject s ON m.subject_id = s.id
LEFT JOIN users u ON m.user_id = u.id
WHERE m.user_id = user_id;
END
```

3. Call it by

```bash
CALL get_users_marks(2);
```

## Delete statement

```bash
delete from users_2 where name = 'kalpak'
delete from users_2
```

## Update statement

```bash
update users set email = 'bhushan1@gmail.com' where id = 1
update users set email = 'bhushan1@gmail.com'
```
