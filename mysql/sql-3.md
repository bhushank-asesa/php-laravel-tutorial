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