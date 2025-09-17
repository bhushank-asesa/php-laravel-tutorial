# Miscellaneous

## Foreach with & iteration

```php
$arr = [
    [
        "a" => "a1"
    ],
    [
        "a" => "a2"
    ],
];
foreach ($arr as &$item) {
    $item['random_no'] = rand(10000, 99999);
}
print_r($arr);
```

> Need not to create the separate variable as **&$item** reflects in original array
