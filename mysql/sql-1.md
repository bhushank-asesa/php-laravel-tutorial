# SQL 1

## Filter `Where vs Having`

1. where filter on each row
2. having work on aggregate function wherever grouping is needed
3. where and having can be used together
4. sequence
   - where -> group by -> having
5. where has priority over having
6. having slower than where

## SQL Convert Rows to Columns and Columns to Rows without using Pivot Functions

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
