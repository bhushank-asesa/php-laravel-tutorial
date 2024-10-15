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
