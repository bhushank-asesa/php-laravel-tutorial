# Constant

## Defining Method

- identifier (name) for a simple value.
- The value cannot be changed during the script.
- valid constant name starts with a letter or underscore (no $ sign before the constant name).
- constants are automatically global across the entire script.

> define(name, value);

- also accept array as value

```php
const NameFirst = "Name first";
define("name", "Bhushan");
echo name;
echo NameFirst;
```

```bash
Bhushan
Name first
```

## Magic constant

| Constant         | Description                                                                                  |
| ---------------- | -------------------------------------------------------------------------------------------- |
| **CLASS**        | If used inside a class, the class name is returned.                                          |
| **DIR**          | The directory of the file.                                                                   |
| **FILE**         | The file name including the full path.                                                       |
| **FUNCTION**     | If inside a function, the function name is returned.                                         |
| **LINE**         | The current line number.                                                                     |
| **METHOD**       | If used inside a function that belongs to a class, both class and function name is returned. |
| **NAMESPACE**    | If used inside a namespace, the name of the namespace is returned.                           |
| **TRAIT**        | If used inside a trait, the trait name is returned.                                          |
| ClassName::class | Returns the name of the specified class and the name of the namespace, if any.               |

> The magic constants are case-insensitive, meaning **LINE** returns the same as **line**.
