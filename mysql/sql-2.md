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
