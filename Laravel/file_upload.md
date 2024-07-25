# File Upload

## Changes in `config\filesystems.php`

1. To upload file in public folder, add element in disks array

```bash
'public_uploads' => [
    'driver' => 'local',
    'root' => public_path(),
],
```

2.  To upload file in private folder, add element in disks array

```bash
array 'private' => [
    'driver' => 'local',
    'root' => storage_path('app/private'),
],
```

3. To upload file in storage public file, add element in disks array

```bash
'public' => [
    'driver' => 'local',
    'root' => storage_path('app/public'),
    'url' => env('APP_URL') . '/storage',
    'visibility' => 'public',
    'throw' => false,
],
```

## In file `routes\web.php`

```bash
Route::get('get-file-content/{path}', function ($path) {
    $fileContent = Storage::disk('private')->get($path);
    $fileMimeType = Storage::disk('private')->mimeType($path);

    return response($fileContent)->header('Content-Type', $fileMimeType);
})->where('path', '.*')->name('file.url');
```

## Change in `app\Providers\AppServiceProvider.php`

```bash
public function boot(): void
{
    Storage::disk('local')->buildTemporaryUrlsUsing(function ($path, $expiration, $options) {
        return URL::temporarySignedRoute(
            'file.url',
            $expiration,
            array_merge($options, ['path' => $path])
        );
    });
}
```

## link storage to public

```bash
php artisan storage:link
```

- INFO The [C:\xampp\htdocs\demo-laravel-11\public\storage] link has been connected to [C:\xampp\htdocs\demo-laravel-11\storage\app/public].

## Usage

- Get temporary URL

```bash
function getFileTemporaryURL($path, $minutes = null)
{

    // check file exists
    try {
        $expireTime = now()->addMinutes(60);
        if ($minutes && is_numeric($minutes) && $minutes > 1) {
            $expireTime = now()->addMinutes($minutes);
        }
        $fileURL = Storage::disk("local")->temporaryUrl(
            $path,
            $expireTime
        );
        return $fileURL;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
```

- Create Directory

```bash
function createDirectory($path)
{
    $permissions = 0755;
    if (!is_dir($path)) {
        mkdir($path, $permissions, true);
    }
}
```

- Upload File

```bash
function uploadFile($file, $fileName, $disk)
{
    $fileName = $fileName . "." . $file->extension();
    $path = "file_upload_demo/";
    createDirectory($path);
    $file->storeAs("file_upload_demo/", $fileName, ['disk' => $disk]);
    return $path . "{$fileName}";
}
```

- File attributes and upload file

```bash
if ($request->hasFile("single_file")) {
    $file = $request->file("single_file");
    $response['baseName'] = $file->getBasename();
    $response['getClientMimeType'] = $file->getClientMimeType();
    $response['getClientOriginalExtension'] = $file->getClientOriginalExtension();
    $response['getClientOriginalName'] = $getClientOriginalName = $file->getClientOriginalName();
    $response['getClientOriginalPath'] = $file->getClientOriginalPath();
    $response['getFileInfo'] = $file->getFileInfo();
    $response['getExtension'] = $file->getExtension();
    $response['PATHINFO_FILENAME'] = $fileOriginalName = pathinfo($getClientOriginalName, PATHINFO_FILENAME);
    $response['public_path'] = uploadFile($file, "public_" . $fileOriginalName, "public_uploads");
    $response['private_path'] = uploadFile($file, "private_" . $fileOriginalName, "private");

    $cropFileName = "private_" . $fileOriginalName;

    $response['public_storage_path'] = uploadFile($file, "storage_public_" . $fileOriginalName, "public");

    $response['public_path_url'] = asset($response['public_path']);
    $response['private_path_url'] = getFileTemporaryURL($response['private_path']);
    $response['public_storage_path_temp_url'] = asset("storage/" . $response['public_storage_path']);

    return response()->json($response);
}
```
