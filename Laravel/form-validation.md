# Form Validation

## routes

```php
use Illuminate\Http\Request;
Route::view("user-form", "user-form");
Route::post("submit-form",function(Request $request){});
```

## View

```php
<form action="submit-form" method="POST">
@csrf
@if ($errors->any())
<div>
    <strong>Validation Errors</strong>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</div>
@endif
<div class="mb-3">
    <label>Name</label>
    <input type="text" class='form-control {{ $errors->first("name") ? "text-danger" :"" }}' id="name" name="name" value='{{ old("name") }}'>
    @error("name")
    <div id="nameHelp">{{$message}}</div>
    @enderror
</div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
```

## action code

```php
$request->validate([
    "name" => "required|min:3|max:255",
    "email" => "required|email|max:255",
    "gender" => ["required", Rule::in(['male,female'])],
], [
    'name.min' => "Name should be minimum :min characters" // if not custom message here then default message will shown
]);
return $request;
```

* if not custom message here then default message will shown
* This default message available in `lang\en\validation.php`
* Run command `php artisan lang:publish` to get `lang\en\validation.php`
* Changes in `lang\en\validation.php` affects for all project

## Custom Rule

```php
php artisan make:rule Ucfirst
```

1. In file `app\Rules\Ucfirst.php`

```php
<?php
namespace App\Rules;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
class Ucfirst implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (ucfirst($value) != $value) {
            $fail("The :attribute should be ucfirst!!!");
        }
    }
}
```

2. Usage

```php
use App\Rules\Ucfirst;
$request->validate(["name" => ['required', 'min:3', 'max:255', new Ucfirst]]);
```

## Validation by Exception

```php
use Illuminate\Support\Facades\Validator; 

$rules = [

        'id'=> 'required|integer|  exists:delivery_shipment_details,id',
        'date_of_delivery' => 'required|date'
    ];

$errorMessage = []; 

$validator = Validator::make($request->all(), $rules, $errorMessage); 

if ($validator->fails()) {

    $data = $validator->messages();
    throw new Exception($validator->errors()->first(), 404);

}
```

## Validation single value other than request

```php
use Illuminate\Support\Facades\Validator; 
private function isValidDate($string)
{
    $validator = Validator::make(
        ['date' => $string],
        ['date' => 'date_format:Y-m-d']
    );
    return !$validator->fails();
}
```