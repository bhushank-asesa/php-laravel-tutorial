# SQL 1

## 1 Filter `Where vs Having`

1. where filter on each row
2. having work on aggregate function wherever grouping is needed
3. where and having can be used together
4. sequence
   - where -> group by -> having
5. where has priority over having
6. having slower than where

## 2 SQL Convert Rows to Columns and Columns to Rows without using Pivot Functions

```sql
create table emp_compensation (
emp_id int,
salary_component_type varchar(20),
val int
);
```

```sql
insert into emp_compensation
values (1,'salary',10000),
(1,'bonus',5000),
(1,'hike_percent',10),
(2,'salary',15000),
(2,'bonus',7000),
(2,'hike_percent',8),
(3,'salary',12000),
(3,'bonus',6000),
(3,'hike_percent',7);
```

### Use Case

```sql
SELECT
    emp_id,
    CASE WHEN salary_component_type = "bonus" THEN val END AS bonus,
    CASE WHEN salary_component_type = "salary" THEN val END AS salary,
    CASE WHEN salary_component_type = "hike_percent" THEN val END AS hike_percent
FROM
    `emp_compensation`
```

```sql
SELECT
    emp_id,
    sum(CASE WHEN salary_component_type = "bonus" THEN val END) AS bonus,
    sum(CASE WHEN salary_component_type = "salary" THEN val END) AS salary,
    sum(CASE WHEN salary_component_type = "hike_percent" THEN val END) AS hike_percent
FROM
    `emp_compensation`
group by emp_id
```

## Find employees with salary more than their managers salary

```sql
create table emp_manager(emp_id int,emp_name varchar(50),salary int(20),manager_id int(10));
```

```sql
insert into emp_manager values(	1	,'Ankit',	10000	,4	);
insert into emp_manager values(	2	,'Mohit',	15000	,5	);
insert into emp_manager values(	3	,'Vikas',	10000	,4	);
insert into emp_manager values(	4	,'Rohit',	5000	,2	);
insert into emp_manager values(	5	,'Mudit',	12000	,6	);
insert into emp_manager values(	6	,'Agam',	12000	,2	);
insert into emp_manager values(	7	,'Sanjay',	9000	,2	);
insert into emp_manager values(	8	,'Ashish',	5000	,2	);
```

```sql
SELECT e.emp_id, e.emp_name,e.salary, m.emp_name as manager_name, m.salary as manager_salary from emp_manager e
INNER join emp_manager m on e.manager_id = m.emp_id
where e.salary > m.salary
```

## 16 SQL to Count Occurrence of a Character/Word in a String

```sql
SELECT emp_name,REPLACE(emp_name," ",""),length(emp_name)-length(REPLACE(emp_name," ","")) as empName FROM `emp_manager`;
```

```sql
SELECT
    emp_name,
    REPLACE(emp_name, "Sa", ""),
    length(emp_name)-length(REPLACE(emp_name, "Sa", "")) as  difference,
    cast((length(emp_name)-length(REPLACE(emp_name, "Sa", "")))/length("Sa") as unsigned) as occurrence
FROM
    `emp_manager`;
```

## 8 How to Calculate Mode in SQL | How to Find Most Frequent Value in a Column

```sql
create table mode (id int);
```

```sql
insert into mode values (1),(2),(2),(3),(3),(3),(3),(4),(5);
```

```sql
create view maxMode as
select id,count(*) as frequency from mode group by id;
```

```sql
SELECT * FROM `maxmode` WHERE frequency = (select max(frequency) from maxmode)
```

```sql
SELECT *,rank() over (order by frequency DESC) as rank FROM `maxmode`
```

```sql
SELECT * FROM (
    SELECT *, RANK() OVER (ORDER BY frequency DESC) AS rank
    FROM maxmode
) AS ranked
WHERE rank = 1;
```

## 25 Regex search

- Search records where second charcter is any of a to f

```sql
SELECT * FROM `emp_manager` WHERE emp_name REGEXP  '^.[a-f]'
```

- Search records where second character is not n or p

```sql
SELECT * FROM `emp_manager` WHERE emp_name REGEXP  '^.[^no]'
```

- Search records where second character is n or p

```sql
SELECT * FROM `emp_manager` WHERE emp_name REGEXP  '^.[^no]'
```
