# SQL 3

## Common Table Expression

```sql
WITH avg_salary AS (
    SELECT
        manager_id,
        AVG(salary) AS avg_sal
    FROM emp_manager
    GROUP BY manager_id
)
SELECT *
FROM emp_manager em
LEFT JOIN avg_salary avs
    ON em.manager_id = avs.manager_id;
```

> In MariaDB/MySQL, every column in a CTE must have a name (either inherited from the SELECT or explicitly listed)

## 5 How to Practice SQLs Without Creating Tables In Your Database

```sql
WITH
    emp AS(
    SELECT
        1 AS emp_id,
        5000 AS salary,
        'bhushan' AS emp_name
    UNION ALL
SELECT
    2 AS emp_id,
    7000 AS salary,
    'manish' AS emp_name
)
SELECT
    *
FROM
    emp
```

## Cross join

* Don't give any Condition
* Gives cartesian product

```sql
SELECT p.name,s.size,c.color FROM products as p,sizes as s,colors as c
```

### Use case For Prepare master Data

```sql
SELECT t.product_name,t.size,t.color,sum(t.amount) as total_amount from transactions t group by t.product_name,t.color,t.size
```

* but it will give for sold records

```sql
with txns as (SELECT t.product_name,t.size,t.color,sum(t.amount) as total_amount from transactions t group by t.product_name,t.color,t.size),
masterData as (SELECT p.name,s.size,c.color FROM products as p,sizes as s,colors as c)

SELECT m.name,m.size,m.color,ifnull(total_amount,0) from masterData  m
left join txns t on m.name = t.product_name and m.size = t.size and m.color = t.color
order by total_amount
```

* it will 0 for not sold products with cross join

### Prepare large no of rows for performance Testing

## Joins

### Inner Join

* Common record

```sql
SELECT * FROM emp e
inner join dept d on e.department_id = d.dep_id
```

### Left Join

* Common record with non matching left table record

```sql
SELECT * FROM emp e
left join dept d on e.department_id = d.dep_id
```

### Right Join

* Common record with non matching right table record=

```sql
SELECT * FROM emp e
right join dept d on e.department_id = d.dep_id
```

### Full Outer Join

* Gives everything

```sql
SELECT * FROM emp e
full outer join dept d on e.department_id = d.dep_id
```

> null=null not joined in full outer record

## 18 SQL Full Outer Join Using UNION For MySQL

```sql
SELECT emp_id,dept_name,department_id,d.dep_id,d.dep_name FROM emp e
left join dept d on e.department_id = d.dep_id

UNION

SELECT emp_id,dept_name,department_id,d.dep_id,d.dep_name FROM dept d
left join emp e on d.dep_id = e.department_id
```

## 19 RANK, DENSE_RANK, ROW_NUMBER SQL Analytical Functions Simplified

```sql
select * ,
rank() over(order by salary desc) as rnk,
dense_rank() over(order by salary desc) as drnk,
row_number() over(order by salary desc) as rn
from emp
```

* rank will skip number that is 1, 1, 3, 3, 5
* dense rank will not skip eg 1, 1, 2, 2, 3
* you can use partition by
* Find Second Highest Salary by partition

```sql
select _ from (select _,department_id as did,dense_rank() over (PARTITION by department_id order by salary desc) as rn from emp) a where rn=2
```

## 20 SQL Left Outer Join Master Class

```sql
SELECT * FROM emp e
left join dept d on e.department_id = d.dep_id where d.dep_name = 'Analyst'
```

* only gives Analyst rows

```sql
SELECT * FROM emp e
left join dept d on e.department_id = d.dep_id and d.dep_name = 'Analyst'
```

* This will give analyst join and nul for others like inner join
* on dep_name = 'Analyst' will join and other will null

```sql
SELECT * FROM emp e
left join dept d on e.department_id = d.dep_id and e.salary = 27000
```

* on salary 27000 will join and other will null

## 22 Solving a REAL Business Use Case Using SQL | Business Days Excluding Weekends and Public Holidays

## 23 Convert Comma Separated Values into Rows

```sql
SELECT
    *,
    DATEDIFF(resolved_date, create_date) AS actual_days,
    DATEDIFF(resolved_date, create_date) - 2 *(
        WEEK(resolved_date) - WEEK(create_date)
    ) as businessDays
FROM
    tickets
```

```sql
SELECT
    t.ticket_id,
    t.create_date,
    t.resolved_date,
    COUNT(h.holiday_date) AS no_of_holidays
FROM
    tickets t
LEFT JOIN holidays h ON
    h.holiday_date BETWEEN t.create_date AND t.resolved_date
GROUP BY
    t.ticket_id,
    t.create_date,
    t.resolved_date
```

```sql
SELECT
    *,
    DATEDIFF(resolved_date, create_date) AS actual_days,
    DATEDIFF(resolved_date, create_date) - 2 *(
        WEEK(resolved_date) - WEEK(create_date)
    ) -no_of_holidays as businessDays from (SELECT
    t.ticket_id,
    t.create_date,
    t.resolved_date,
    COUNT(h.holiday_date) AS no_of_holidays
FROM
    tickets t
LEFT JOIN holidays h ON
    h.holiday_date BETWEEN t.create_date AND t.resolved_date
GROUP BY
    t.ticket_id,
    t.create_date,
    t.resolved_date) a
```

```sql
SELECT
    *,
    DATEDIFF(resolved_date, create_date) AS actual_days,
    DATEDIFF(resolved_date, create_date) - 2 *(
        WEEK(resolved_date) - WEEK(create_date)
    ) -no_of_holidays as businessDays from (SELECT
    t.ticket_id,
    t.create_date,
    t.resolved_date,
    COUNT(h.holiday_date) AS no_of_holidays
FROM
    tickets t
LEFT JOIN holidays h ON
    h.holiday_date BETWEEN t.create_date AND t.resolved_date
and dayname(h.holiday_date) <> 'Saturday' AND  dayname(h.holiday_date) <> 'Sunday'
GROUP BY
    t.ticket_id,
    t.create_date,
    t.resolved_date) a;
```

## 24 Aggregation and Window Functions Together in a Single SQL

```sql
select * from (
    select category,product_name,sum(sales) as total_sales,
    rank() over (partition by category order by sum(sales) desc) as rn
    from orders
) a
where rn <= 5
```

* it will group first then partition

## 27 first_value and last_value SQL window functions

```sql
select *,
last_value(emp_name) over (order by emp_age) as oldest,
first_value(emp_name) over (order by emp_age) as youngest
from employee e
```

* **first_value** -> it gives first value but always has first value based on over
* **last_value** -> it gives last value but till row because next rows are unknown

```sql
select *,
last_value(emp_name) over (order by emp_age rows BETWEEN CURRENT row and unbounded following) as oldest,
first_value(emp_name) over (order by emp_age) as youngest
from employee e
```

* This Solve last value next row problem

```sql
select *,
last_value(emp_name) over (PARTITION by e.dept_id order by emp_age rows BETWEEN CURRENT row and unbounded following) as oldest,
first_value(emp_name) over (PARTITION by e.dept_id order by emp_age) as youngest
from employee e
```

* added partition to it
