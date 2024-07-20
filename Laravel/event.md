# Model Events

## Model Events

1. Create Post and User model
2. Make has many relation User->Post
3. In `app\Models\User.php`

```bash
protected static function booted(): void
{
    static::deleted(function ($user) {
        // $user->post()->delete(); // not works when foreign key is on/established
        Log::info('User Deleted : ' . $user->id);
    });
}
```

4. Delete user

```bash
$userDeleted = User::find($user_id)->delete();
```

5. Other event

- creating: Call Before Create Record.
- created: Call After Created Record.
- updating: Call Before Update Record.
- updated: Class After Updated Record.
- deleting: Call Before Delete Record.
- deleted: Call After Deleted Record.
- retrieved: Call Retrieve Data from Database.
- saving: Call Before Creating or Updating Record.
- saved: Call After Created or Updated Record.
- restoring: Call Before Restore Record.
- restored: Call After Restore Record.
- replicating: Call on replicate Record.

## Observer and model event work on single object
