# Request & Response

## add request basic file

- app\Http\Requests\RequestWrapper.php

## Create request

```bash
php artisan make:request Public/RegisterRequest
```

1. check `Laravel\files\RegisterRequest.php`
2. add it in any post api routes and run it

```bash

Route::post('register', function (RegisterRequest $request) {
    echo "This is register route and validation completes";
});
```

3. Validation failed response

```bash
{
  "message": "Validation failed",
  "data": {
    "username": [
      "The username field is required."
    ],
    "email": [
      "The email field is required."
    ],
    "register_type": [
      "The register type field is required."
    ],
    "phone_no": [
      "The phone no field is required."
    ],
    "subject_id": [
      "The subject id field is required."
    ],
    "re_enter_password": [
      "The re enter password field is required."
    ]
  },
  "errors": [
    "The username field is required.",
    "The email field is required.",
    "The register type field is required.",
    "The phone no field is required.",
    "The subject id field is required.",
    "The re enter password field is required."
  ],
  "toast": true
}
```
