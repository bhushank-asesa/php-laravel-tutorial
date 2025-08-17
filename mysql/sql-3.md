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

- Don't give any Condition
- Gives cartesian product

```sql
SELECT p.name,s.size,c.color FROM products as p,sizes as s,colors as c
```

### Use case For Prepare master Data

```sql
SELECT t.product_name,t.size,t.color,sum(t.amount) as total_amount from transactions t group by t.product_name,t.color,t.size
```

- but it will give for sold records

```sql
with txns as (SELECT t.product_name,t.size,t.color,sum(t.amount) as total_amount from transactions t group by t.product_name,t.color,t.size),
masterData as (SELECT p.name,s.size,c.color FROM products as p,sizes as s,colors as c)

SELECT m.name,m.size,m.color,ifnull(total_amount,0) from masterData  m
left join txns t on m.name = t.product_name and m.size = t.size and m.color = t.color
order by total_amount
```

- it will 0 for not sold products with cross join

### Prepare large no of rows for performance Testing

## Joins

### Inner Join

- Common record

```sql
SELECT * FROM emp e
inner join dept d on e.department_id = d.dep_id
```

### Left Join

- Common record with non matching left table record

```sql
SELECT * FROM emp e
left join dept d on e.department_id = d.dep_id
```

### Right Join

- Common record with non matching right table record=

```sql
SELECT * FROM emp e
right join dept d on e.department_id = d.dep_id
```

### Full Outer Join

- Gives everything

```sql
SELECT * FROM emp e
full outer join dept d on e.department_id = d.dep_id
```

> null=null not joined in full outer record
