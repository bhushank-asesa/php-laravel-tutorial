# Migrations

## Create migrations using following command

- It creates migrations in public folder

```bash
php artisan make:migration create_roles_table --path=database/migrations/public
```

- add column to Role table

```bash
php artisan make:migration add_description_to_roles_table --path=database/migrations/public
```

## definition or column list

```php
public function up(): void
{
    Schema::create('roles', function (Blueprint $table) {
        $table->id();
        $table->string("name", 255); // 255 by default
        $table->string("key", 255)->unique();
        $table->enum("status", ["1", "2"])->default('')->comment("1=active 2=deactivated");
        $table->json("features")->nullable();
        $table->softDeletes();
        $table->timestamps();
    });
}
```

## run migrations

```bash
php artisan migrate --path=database/migrations/public
```

```bash
php artisan migrate --path=database/migrations/*
```

```bash
php artisan migrate
```

```bash
php artisan migrate:rollback --path=/database/migrations/your_migration_file.php
```

## Foreign key in Primary users added by following

```php
$table->unsignedBigInteger("role_id");
$table->foreign("role_id")->references("id")->on("roles");
```
