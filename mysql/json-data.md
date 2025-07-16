# JSON Data

## Table

```sql
CREATE TABLE `jsontest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jsonText1` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`jsonText1`)),
  `jsonText2` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`jsonText2`)),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
```

## Data

```sql
INSERT INTO `jsontest` ( `id` , `jsonText1` , `jsonText2` ) VALUES
(1, '[\r\n    123, \r\n    12645, \r\n    1245\r\n]', '{\r\n    \"age\": 15, \r\n    \"name\": \"John\"\r\n}'), 
(2, '[\r\n    45, \r\n    47, \r\n    49\r\n]', '[\n    {\n        \"age\": 17, \n        \"name\": \"Clark\"\n    }\n]'); 
```

## JSON_CONTAINS

```sql
SELECT *,JSON_CONTAINS(jsonText1, '45') AS contains_age_123 FROM jsontest;
SELECT *,JSON_CONTAINS(jsonText2, '17','$.age') AS contains_age_123 FROM jsontest;
SELECT *,JSON_CONTAINS(jsonText2, '{"age": 17}', '$') FROM jsontest
SELECT *,JSON_CONTAINS(jsonText2, '{"age": 17}', '$') FROM jsontest WHERE JSON_CONTAINS(jsonText2, '{"age": 17}', '$');
```
