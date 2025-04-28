# Image Webp Conversion

## Package installation

```bash
composer require intervention/image
```

## Common function

```php
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;
public function convertUploadedFileToWebP(UploadedFile $file, $destinationPath, $quality = 80)
{
    $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());

    $image = $manager->read($file->getRealPath())->toWebp(quality: $quality);

    $image->save($destinationPath);
}
```

## Use
```php

$file = $request->file('imageFile');
$webpFileName = "<random-name>.webp";
$destination = public_path("path-to-store-file/$webpFileName");
convertUploadedFileToWebP($file, $destination, 90);
```