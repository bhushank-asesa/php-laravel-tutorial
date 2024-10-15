# MySQL Interview Questions

## Find duplicate records and delete them

```sql
SELECT email,username,count(*) FROM `test` group by email,username having count(*) > 1;
delete from test where id not in (SELECT max(id) FROM `test` t1 group by email,username);
```

## Find project assigned to whom

```sql
select count(*),t.employee,e.username from task t left join employee e on t.employee=e.id group by employee
```

## Second Highest Salary

```sql
SELECT MAX(salary)
FROM employees
WHERE salary < (SELECT MAX(salary) FROM employees)

SELECT salary
FROM employees
ORDER BY salary DESC
LIMIT 1 OFFSET 1;

SELECT salary
FROM (
    SELECT salary, ROW_NUMBER() OVER (ORDER BY salary DESC) AS rn
    FROM employees
) AS ranked_employees
WHERE rn = 2;


SELECT salary
FROM (
    SELECT salary, ROW_NUMBER() OVER (ORDER BY salary DESC) AS rn
    FROM employees
) AS ranked_employees
WHERE rn = n;

```

- **_Note_**: If there are multiple employees with the same second-highest salary, these methods will return one of those salaries.
