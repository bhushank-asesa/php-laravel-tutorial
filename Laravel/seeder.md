# Seeder

## Create seeder

```bash
php artisan make:seeder RoleSeeder
```

## Add code to run method of RoleSeeder

```php
public function run(): void
{
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    DB::table('roles')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    $roles = [
        ["name" => "End User", "key" => "end_user"],
        ["name" => "Admin", "key" => "admin"],
    ];
    foreach ($roles as $role) {
        Role::create($role);
    }
}
```

## run seeder using

```bash
php artisan db:seed --class=RoleSeeder
```

## add seeder to database seeder in database\seeders\DatabaseSeeder.php run method

```php
 $this->call(RoleSeeder::class);
```
