# Model

## Create model using following command

```bash
php artisan make:model Public/Role
```

- code

```bash
namespace App\Models\Public;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;
}
```

```bash
php artisan make:model Public/PrimaryUser -m
```

- It creates migrations also if -m is present

## getting model data

1. single row

```bash
$primaryUser = PrimaryUser::first();
if ($primaryUser) {
    print_r($primaryUser->toArray());
} else {
    echo "No primary users available";
}
```

2. All/more than one data

```bash
$primaryUser = PrimaryUser::get();
if ($primaryUser->isNotEmpty()) {
    print_r($primaryUser->toArray());
} else {
    echo "No primary users available";
}
```

3. Where

```bash
$primaryUser = PrimaryUser::where("id", 4)->get();
// $primaryUser = PrimaryUser::whereIn("id", [4, 5])->get();
// $primaryUser = PrimaryUser::whereNotIn("id", [4, 5])->get();
// $primaryUser = PrimaryUser::whereBetween("id", [4, 8])->get();
// $primaryUser = PrimaryUser::whereNotBetween("id", [4, 8])->get();
$search = "hu";
// $primaryUser = PrimaryUser::where(
//     function ($query) use ($search) {
//         $query->where('email', 'like', "%{$search}%")
//             ->orWhere('name', 'like', "%{$search}%");
//     }
// )->get();
// $primaryUser = PrimaryUser::whereBetween("id", [4, 8])->select(['name', 'email'])->get();
// $primaryUser = PrimaryUser::whereBetween("id", [4, 8])->selectRaw('name as username,email')->get();
// $primaryUser = PrimaryUser::whereBetween("id", [4, 8])->selectRaw('name as username')->pluck("username");
// $primaryUser = PrimaryUser::whereBetween("id", [4, 8])->select(['name', 'email'])->get();
// $primaryUser = PrimaryUser::where("birthdate", ">", "2014-05-31")->select(['name', 'email', 'birthdate'])->get();
// $primaryUser = PrimaryUser::where("birthdate", "<", "2014-05-31")->select(['name', 'email', 'birthdate'])->get();
// $primaryUser = PrimaryUser::where("birthdate", "<=", "2014-05-31")->select(['name', 'email', 'birthdate'])->get();

// $primaryUser = PrimaryUser::orderBy("birthdate", "asc")->limit(5)->offset(0)->get();
// $primaryUser = PrimaryUser::groupBy("role_id")->selectRaw('count(*),role_id')->get();
// $primaryUser = PrimaryUser::selectRaw('min(birthdate),max(birthdate)')->get();
// $primaryUser = PrimaryUser::selectRaw('min(birthdate),max(birthdate)')->get();
// $primaryUser = DB::table('primary_users as pu')->whereIn('pu.id', [2, 3, 4, 5, 6, 7, 8])->leftJoin("roles as r", "pu.role_id", "=", "r.id")->selectRaw("pu.id,pu.name,pu.email,r.name as role_name")->get();

if ($primaryUser->isNotEmpty()) {
    $primaryUser->transform(function ($user) {
        $user->name = strtoupper($user->name);
        return $user;
    });
    echo "<pre>";
    print_r($primaryUser->toArray());
} else {
    echo "No primary users available by where condition";
}
```

## Route by mode id

```bash
Route::get("/single-by-id/{user_id}", function (PrimaryUser $user_id) {
    try {
        return response()->json($user_id);
    } catch (ModelNotFoundException $e) {
        // it gives 404 error if user_id not present
        return response()->json(['message' => 'User not found'], 404);
    }
});
```

## Create or update

```bash
try {
    DB::beginTransaction();
    $userProfile = UserProfile::where("primary_user_id", $user_id)->first();
    if (!$userProfile)
        $userProfile = new UserProfile();
    $userProfile->primary_user_id = $user_id;
    $userProfile->instagram_url = "some instagram url " . Str::random(32);
    $userProfile->save();
    DB::commit();
    print_r($userProfile->toArray());
} catch (\Illuminate\Database\QueryException $e) {
    DB::rollBack();
    echo $e->getMessage();
    Log::info('log Error : ' . $e->getMessage() . " @" . $e->getLine() . " \nin " . $e->getFile());
}
```

## Some extra model function

```bash
$res['maxPostViews'] = Post::max("counter");
$res['minPostViews'] = Post::min("counter");
$res['sumPostViews'] = Post::sum("counter");
$res['avgPostViews'] = Post::avg("counter");
```
