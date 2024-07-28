# Has Many Through

## Models

- User

```bash
public function posts()
{
    return $this->hasMany(Post::class);
}
public function comments()
{
    return $this->hasManyThrough(Comment::class, Post::class);
}
public function myComments()
{
    return $this->hasMany(Comment::class);
}
```

- Post

```bash
public function user()
{
    return $this->belongsTo(User::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}
```

- Comment

```bash
public function post()
{
    return $this->belongsTo(Post::class);
}
public function user()
{
    return $this->belongsTo(User::class);

}
```

## Usage

```bash
$user = User::find($id);
$comments = $user->comments;
// this will return user`s post`s comment
$userData = User::where("id", $id)->with("posts.comments")->first();
// return all post_with_comments of user with id
$post = Post::where("id", $id)->with("user")->with('comments')->first();
// return post with owner and it`s all comments
$comment = Comment::where("id", $id)->with("user")->with("post")->first();
// it returns a comment with it`s user and post id
```
