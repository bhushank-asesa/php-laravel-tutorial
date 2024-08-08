# Observer

## Create observer using command

```bash
php artisan make:observer PostObserver --model=Post
```

## Add observer in `app\Providers\AppServiceProvider.php` in boot method

```php
 Post::observe(PostObserver::class);
```

## Add action in your event `app\Observers\PostObserver.php`

```php
public function saving(Post $post): void
{
    $post->slug = Str::slug($post->title, "-");
}
public function retrieved(Post $post): void
{
    $post->increment("counter");
}
```

## Usage

```php
$post = new Post();
$post->title = $request->title;
$post->user_id = "5";
$post->description = $request->description;
$post->save();
// $post->deleteQuietly()
// $post->saveQuietly(); // ignore observer event
// other Quietly methods available eg. deleteQuietly
```

## Observer and model event work on single object
