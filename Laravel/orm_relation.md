# ORM relation

## has one

1. add foreign key in user_profile

```bash
$table->unsignedBigInteger('primary_user_id');
$table->foreign('primary_user_id')->references('id')->on('primary_users')->onDelete('cascade');
```

2. in `app\Models\Public\PrimaryUser.php`

```bash
public function profile()
{
    return $this->hasOne(UserProfile::class);
}
```

3. use in controller or route function

```bash
$primary_user = PrimaryUser::with('profile')->get();
if ($primary_user->isNotEmpty())
    print_r($primary_user->toArray());
else
    echo "no primary users";
```

## belongs to

1. add foreign key in users

```bash
$table->unsignedBigInteger("role_id");
$table->foreign("role_id")->references("id")->on("roles");
```

2. in `app\Models\Public\PrimaryUser.php`

```bash
public function role()
{
    return $this->belongsTo(Role::class)->select(['name', 'key', 'description']);
}
```

3. use in controller or route function

```bash
$primary_user = PrimaryUser::where("id", "5")->first();
if ($primary_user)
    print_r($primary_user->role->toArray());
else
    echo "no primary users";
```

## has-many

1. in Role

```bash
public function primaryUsers()
{
    return $this->hasMany(PrimaryUser::class);
}
```

2. add foreign key in users

```bash
$table->unsignedBigInteger("role_id");
$table->foreign("role_id")->references("id")->on("roles");
```

3. Usage

```bash
$primary_roles = Role::with('primaryUsers')->get();
echo "<pre>";
if ($primary_roles->isNotEmpty())
    print_r($primary_roles->toArray());
else
    echo "no primary roles";
```

## Relation types

- One to One
- One to Many
- One to Many (Inverse) / Belongs To
- Has One of Many
- Has One Through
- Has Many Through
