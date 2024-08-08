# Controller

## commands to create Controller

```bash
php artisan make:controller AddressController
```

```bash
php artisan make:controller AddressController --resource
```

## routes

```php
Route::get("/countries", [PublicController::class, 'getCountries']);
Route::resource('address', AddressController::class);
```

## Routes

| Method    | Route                  | Named_route     | Controller                |
| :-------- | :--------------------- | :-------------- | :------------------------ |
| GET       | address                | address.index   | AddressController@index   |
| POST      | address                | address.store   | AddressController@store   |
| GET       | address/create         | address.create  | AddressController@create  |
| GET       | address/{address}      | address.show    | AddressController@show    |
| PUT/PATCH | address/{address}      | address.update  | AddressController@update  |
| DELETE    | address/{address}      | address.destroy | AddressController@destroy |
| GET       | address/{address}/edit | address.edit    | AddressController@edit    |
