#

## 13 Custom sort

```sql
create table happiness_index
(rank int,
country varchar(55),
Happiness_2021 varchar(55),
Happiness_2020 varchar(55),
Population_2022 varchar(55)
);

insert into happiness_index values
(1,	'Finland',	7.842,	7.809,	5554960),
(2,	'Denmark',	7.62,	7.646,	5834950),
(3,	'Switzerland',	7.571,	7.56,	8773637),
(4,	'Iceland',	7.554,	7.504,	345393),
(5,	'Netherlands',	7.464,	7.449,	17211447),
(6,	'Norway',	7.392,	7.488,	5511370),
(7,	'Sweden',	7.363,	7.353,	10218971),
(8,	'Luxembourg',	7.324,	7.238,	642371),
(9,	'New Zealand',	7.277,	7.3,	4898203),
(10, 'Austria',	7.268,	7.294,	9066710);

```

```sql
SELECT *,
    CASE
        WHEN country = 'Norway' THEN 2
        WHEN country = 'Sweden' THEN 1
        ELSE 0
    END AS country_derived
FROM
    `happiness_index`
order by
    country_derived desc,
    Happiness_2021 desc
```

## 3 Top 10 interview question

```sql
create table emp(
emp_id int,
emp_name varchar(20),
department_id int,
salary int,
manager_id int,
emp_age int);

insert into emp
values
(1, 'Ankit', 100,10000, 4, 39);
insert into emp
values (2, 'Mohit', 100, 15000, 5, 48);
insert into emp
values (3, 'Vikas', 100, 10000,4,37);
insert into emp
values (4, 'Rohit', 100, 5000, 2, 16);
insert into emp
values (5, 'Mudit', 200, 12000, 6,55);
insert into emp
values (6, 'Agam', 200, 12000,2, 14);
insert into emp
values (7, 'Sanjay', 200, 9000, 2,13);
insert into emp
values (8, 'Ashish', 200,5000,2,12);
insert into emp
values (9, 'Mukesh',300,6000,6,51);
insert into emp
values (10, 'Rakesh',300,7000,6,50);
```

### Find duplicates record

```sql
SELECT emp_id,count(1) from emp group by emp_id HAVING count(1) > 1
```

### Delete duplicate records

````

### Difference between union and union all

```sql
SELECT emp_id FROM emp
union all
select emp_id from emp1;

SELECT emp_id FROM emp
union
select emp_id from emp1;
````

- **union all** Gives all records with duplicates
- **union** Gives all records without duplicates

### Find second highest salary from each dept

```sql
select *,department_id as did,dense_rank() over (PARTITION by department_id order by salary desc) as rn from emp
```

```sql
select * from (select *,department_id as did,dense_rank() over (PARTITION by department_id order by salary desc) as rn from emp) a where rn=2
```

- rank will skip number that is 1,1,3,3,5
- dense rank will not skip eg 1,1,2,2,3

### Employee not in department table

```sql
SELECT * FROM emp
left join dept on emp.department_id = dept.dep_id
where dept.dep_id is null
```

### Find all rows where emp name is `Rohit`

```sql
SELECT * FROM `emp` where upper(emp_name) = "ROHIT"
```

- check for upper

## 11 UPDATE Statement | SQL UPDATE A-Z Tutorial | SQL Update with JOIN

```sql
update emp set salary = salary * 1.2
```

```sql
update emp set salary = case when department_id = 100 then salary * 1.5 else salary * 2.1 end
```

```sql
ALTER TABLE `emp` ADD `dept_name` VARCHAR(255) CHARACTER SET armscii8 COLLATE armscii8_bin NULL DEFAULT NULL AFTER `emp_age`, ADD `gender` VARCHAR(255) NULL DEFAULT NULL AFTER `dept_name`;
```

```sql
UPDATE emp e
INNER JOIN dept d ON e.department_id = d.dep_id
SET e.dept_name = d.dep_name;
```

- Swap Values

```sql
update emp set gender = case when department_id = 100 then "Female" else "Male" end
```

> Before Update Preview

```sql
select *,case when gender = "Female" then "Male" else "Female" end as newGender from emp
```

```sql
update emp set gender = case when gender = "Female" then "Male" else "Female" end
```

## 29 How To Create Dynamic Insert Statements From a Table Data

```sql
SELECT concat('insert into emp3 values(',emp_id,',',char(39),emp_name,char(39),',',salary,',',char(39),dob,char(39),');') from emp3;
```

## 30 SQL Running Total | Advance SQL | Rolling N months SUM, AVG, MIN, MAX

- First select date part year and month, sum by grouping year and month
- convert it into cte
- using cte calculate sum and other over order by year, month with rows between 1 preceding and 1 following
  - Use Your combination

## 33 SQL Order of Execution (Logical Explanation)

- from -> join -> where -> group by -> having -> select -> order by -> limit

## 47 Date and Time Functions in MySQL

```sql
SELECT now(),CURRENT_DATE(),CURRENT_TIME()
```

| now()               | CURRENT_DATE() | CURRENT_TIME() |
| ------------------- | -------------- | -------------- |
| 2025-08-19 20:38:28 | 2025-08-19     | 20:38:28       |

---

```sql
SELECT created_at,date(created_at) as date_1,cast(created_at as date) as date_2 FROM `date_functions_demo`
```

| created_at          | date_1     | date_2     |
| ------------------- | ---------- | ---------- |
| 2024-01-01 10:00:00 | 2024-01-01 | 2024-01-01 |

---

```sql
SELECT created_at,last_day(created_at) as lastDay FROM `date_functions_demo`
```

| created_at          | lastDay    |
| ------------------- | ---------- |
| 2024-01-01 10:00:00 | 2024-01-31 |
| 2023-06-15 08:30:00 | 2023-06-30 |

---

```sql
SELECT created_at,extract(day from created_at) as createdDay,extract(month from created_at) as createdMonth FROM `date_functions_demo`
```

| created_at          | createdDay | createdMonth |
| ------------------- | ---------- | ------------ |
| 2024-01-01 10:00:00 | 1          | 1            |
| 2023-06-15 08:30:00 | 15         | 6            |

---

```sql
SELECT created_at,date_format(created_at,'%d/%m/%y') as customFormatDate FROM `date_functions_demo`
```

| created_at          | customFormatDate |
| ------------------- | ---------------- |
| 2024-01-01 10:00:00 | 01/01/24         |
| 2023-06-15 08:30:00 | 15/06/23         |

---

```sql
SELECT start_date,end_date,datediff(end_date,start_date) FROM `date_functions_demo`
```

| start_date | end_date   | datediff(end_date,start_date) |
| ---------- | ---------- | ----------------------------- |
| 2024-01-01 | 2024-12-31 | 365                           |
| 2023-06-15 | 2024-06-15 | 366                           |

---

```sql
SELECT start_date, date_add(start_date, interval 2 day) add_2_day,date_add(start_date, interval 1 month) add_1_month FROM `date_functions_demo`
```

| start_date | add_2_day  | add_1_month |
| ---------- | ---------- | ----------- |
| 2024-01-01 | 2024-01-03 | 2024-02-01  |
| 2023-06-15 | 2023-06-17 | 2023-07-15  |

---

```sql
SELECT start_date, date_sub(start_date, interval 2 day) sub_2_day,date_sub(start_date, interval 1 month) sub_1_month FROM `date_functions_demo`
```

| start_date | sub_2_day  | sub_1_month |
| ---------- | ---------- | ----------- |
| 2024-01-01 | 2023-12-30 | 2023-12-01  |

---

```sql
SELECT created_at, day(created_at), month(created_at),year(created_at), dayofweek(created_at), dayofyear(created_at),dayofmonth(created_at) FROM `date_functions_demo`;
```

| day(created_at) | created_at          | month(created_at) | year | (created_at) | dayofweek(created_at) | dayofyear(created_at) | dayofmonth(created_at) |
| --------------- | ------------------- | ----------------- | ---- | ------------ | --------------------- | --------------------- | ---------------------- |
| 1               | 2024-01-01 10:00:00 | 1                 | 2024 | 2            | 1                     | 1                     | 1                      |
| 15              | 2023-06-15 08:30:00 | 6                 | 2023 | 5            | 166                   | 15                    | 15                     |

---

```sql
SELECT created_at, monthname(created_at) as monthName,dayname(created_at) as dayName FROM `date_functions_demo`;
```

| created_at          | monthName | dayName  |
| ------------------- | --------- | -------- |
| 2024-01-01 10:00:00 | January   | Monday   |
| 2023-06-15 08:30:00 | June      | Thursday |

---

```sql
SELECT system_date,str_to_date(system_date,"%d/%m/%y") as nullDate,str_to_date(system_date,"%m/%d/%y") as correctDate FROM `date_functions_demo`;
```

| system_date | nullDate | correctDate |
| ----------- | -------- | ----------- |
| 12/30/2024  | NULL     | 2020-12-30  |

---

```sql
SELECT created_at,updated_at,timestampdiff(minute,created_at,updated_at) as minuteDiff,timestampdiff(day,created_at,updated_at) as dayDiff FROM `date_functions_demo`;
```

| created_at          | updated_at          | minuteDiff | dayDiff |
| ------------------- | ------------------- | ---------- | ------- |
| 2024-01-01 10:00:00 | 2024-12-31 23:59:59 | 526439     | 365     |
