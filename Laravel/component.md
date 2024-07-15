# Component

## create component using command

```bash
php artisan make:component Alert
```

## component class file `app\View\Components\Alert.php`

```bash
<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public string $type;
    public string $message;
    public function __construct($type,$message)
    {
        $this->type = $type;
        $this->message = $message;
    }
    public function render(): View|Closure|string
    {
        return view('components.alert', [
            'type' => $this->type,
            'message' => $this->message,
        ]);
    }
}

```

## component blade file `resources\views\components\alert.blade.php`

```bsah
<div class="alert alert-{{ $type }}">
    {{ $message }}
</div>
```

## Usage in `resources\views\custom\welcome-2.blade.php`

```bash
<x-alert type="success" message="Operation successful!" />
```
