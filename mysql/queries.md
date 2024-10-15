# MySQL Sample Queries

## Join

### Left Join

```sql
SELECT m.\*,u.name,s.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id
```

## Aggregate Functions with having

```sql
SELECT sum(m.out_of) out_of_sum,sum(m.marks) total_marks, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id
```

```sql
SELECT max(m.marks) max_marks, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id
```

```sql
SELECT sum(m.out_of) out_of_sum,sum(m.marks) total_marks, round((sum(m.marks)/sum(m.out_of))\*100,2) percentage, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id having percentage > 60;
```

```sql
SELECT min(m.marks) min_marks, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id
```

## Calculation

```sql
SELECT sum(m.out_of) out_of_sum,sum(m.marks) total_marks, round((sum(m.marks)/sum(m.out_of))\*100,2) percentage, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id
```

```sql
SELECT sum(m.out_of) out_of_sum,sum(m.marks) total_marks, round((sum(m.marks)/sum(m.out_of))\*100,2) percentage, upper( u.name) upper_name,lower(u.name) lower_name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id having percentage > 60
```

## Date function

```sql
SELECT birthdate, NAME, id, CONCAT(YEAR(CURDATE()), '-', YEAR(birthdate),'-',(RIGHT(CURDATE(), 5) < RIGHT(birthdate, 5))) AS formula, YEAR(CURDATE()) - YEAR(birthdate) - (RIGHT(CURDATE(), 5) < RIGHT(birthdate, 5)) AS age FROM users;
```

## If

```sql
select *, "pass" as result from marks;
```

```sql
SELECT *, IF((marks/out_of *100) >= 35, "pass", "fail") AS result FROM marks;
```

```sql
SELECT sum(marks) all_marks,sum(out_of) all_out_of,(sum(marks)/sum(out_of) *100) percentage, IF((sum(marks)/sum(out_of) *100) >= 35, "pass", "fail") AS result, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id
```

```sql
SELECT sum(marks) all_marks,sum(out_of) all_out_of,(sum(marks)/sum(out_of) *100) percentage, IF((sum(marks)/sum(out_of) *100) >= 35, "pass", "fail") AS result, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id order by percentage desc LIMIT 3
```

## Limit offset

```sql
SELECT sum(marks) all_marks,sum(out_of) all_out_of,(sum(marks)/sum(out_of) *100) percentage, IF((sum(marks)/sum(out_of) *100) >= 35, "pass", "fail") AS result, u.name FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id group by m.user_id order by percentage desc LIMIT 1,3
```

### where

```sql
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

```sql
select DISTINCT(out_of) from marks
```

## copy from another tabel

```sql
insert into users_2 (name,email, birthdate) select name,email, birthdate from users
```

## Union same column needed

```sql
SELECT id, name,birthdate,email
FROM users
UNION
SELECT id, name,birthdate,email
FROM users_2;
```

## Create View

### Create

```sql
create view markslist as select m.\*,u.name as username,s.name as subjectname FROM marks m left join subject s on m.subject_id = s.id left join users u on m.user_id = u.id
```

### Call

```sql
SELECT \* FROM markslist
```

## Trigger

### Definition

```sql
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

```sql
BEGIN
SELECT m.marks, m.out_of,s.name subject_name,u.name as username
FROM marks m
LEFT JOIN subject s ON m.subject_id = s.id
LEFT JOIN users u ON m.user_id = u.id
WHERE m.user_id = user_id;
END
```

3. Call it by

```sql
CALL get_users_marks(2);
```

## Delete statement

```sql
delete from users_2 where name = 'kalpak'
delete from users_2
```

## Update statement

```sql
update users set email = 'bhushan1@gmail.com' where id = 1
update users set email = 'bhushan1@gmail.com'
```

## Rank Query

```sql
SELECT *, RANK() OVER (order by gold desc, silver desc, bronze desc) AS rank FROM `medal` order by gold desc, silver desc, bronze desc;
```
