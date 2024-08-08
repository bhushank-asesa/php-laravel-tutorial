# Component

## Create component using command

```bash
php artisan make:component Alert
```

## Component class file `app\View\Components\Alert.php`

```php
<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public string $type;
    public string $message;
    protected $types = ["info", "danger", "primary", "secondary", 'success'];
    public function __construct($type, $message, public $dismissible = false) // public equivalent to other public
    {
        $this->type = $type;
        $this->message = $message;
    }
    public function validType()
    {
        return in_array($this->type, $this->types) ? $this->type : "info";
    }
    public function render(): View|Closure|string
    {
        return view('components.alert', [
            'type' => $this->type,
            'message' => $this->message,
            'dismissible' => $this->dismissible,
        ]);
    }
}

```

## Component blade file `resources\views\components\alert.blade.php`

1.

```php
<div class="alert alert-{{ $type }}">
    {{ $message }}
</div>
```

2.

```php
<div class="alert alert-{{ $validType }}">
    {{ $message }}
</div>
```

## Usage in `resources\views\custom\welcome-2.blade.php`

```php
<x-alert type="success" message="Operation successful!" />
```

1. Use php variable

```php
@php
$message="php variabled message";
@endphp
<x-alert type="delete" :$message />
```

## Different scenario

1. Attributes

- component

```php
<div class="alert alert-{{ $validType }}" {{ $attributes }}>
    {{ $message }}
</div>
```

- Usage

```php
<x-alert type="danger" message="Danger message" id="danger-alert" class="m-2" />
```

2. Merged Attribute only class

- Component

```php
<div  {{ $attributes->merge(['class'=>'alert alert-'.$validType]) }}  role="alert">
    {{ $message }}
</div>

<div  {{ $attributes->merge(['class'=>'alert alert-'.$validType,'role'=>"flash"]) }}  >
    {{ $message }}
</div>

<div  {{ $attributes->merge(['class'=>'alert alert-'.$validType,'role'=>$attributes->prepends("flash")]) }}  >
    {{ $message }}
</div>
```

- Usage

```php
<x-alert type="danger" message="Danger message" id="danger-alert" class="m-2" role="alert" />
```

3. Conditional class

- Component view

```php
<div  {{ $attributes->class(['alert-dismissible fade show'=>$dismissible])->merge(['class'=>'alert alert-'.$validType,'role'=>$attributes->prepends("flash")]) }}  >
    {{ $message }}
    @if($dismissible)
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
```

- Usage

```php
<x-alert type="danger" dismissible message="Danger message" id="danger-alert" class="m-2" role="alert" />
```

## Slot

1. Component view

```php
<div  {{ $attributes->class(['alert-dismissible fade show'=>$dismissible])->merge(['class'=>'alert alert-'.$validType,'role'=>$attributes->prepends("flash")]) }}  >
    {{ $message }}
    @isset($slot)
    {{ $slot }}
    @endisset
    @if($dismissible)
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
```

2. Usage

```php
<x-alert type="danger" dismissible id="danger-alert" class="m-2" role="alert" >
    <h2> This is slot example</h2>
    <hr/>
    <p>lorem lapsum</p>
</x-alert>
```

3. Class

```php
__construct($type, $message = "", public $dismissible = false)
```

## Slot variable

```php
<div  {{ $attributes->class(['alert-dismissible fade show'=>$dismissible])->merge(['class'=>'alert alert-'.$validType,'role'=>$attributes->prepends("flash")]) }}  >
    {{ $message }}
    @isset($slot)
    {{ $slot }}
    @endisset
    @isset($note)
        <small>{{$note}}</small>
    @endisset
    @if($dismissible)
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
```

```php
<x-alert type="danger" dismissible id="danger-alert" class="m-2" role="alert" >
    {{-- <x-slot:note>Developed by Bhushan</x-slot:note> --}}
    <x-slot name="note">Developed by Bhushan</x-slot>
    <h2> This is slot example</h2>
    <hr/>
    <p>lorem lapsum</p>
</x-alert>
```

## HTML link in component

- In `app\View\Components\Alert.php`

```php
public function link($text, $target)
{
    return new HtmlString("<a href='$target' class='text-link'>$text</a>");
}
```

- Component view

```php
<div  {{ $attributes->class(['alert-dismissible fade show'=>$dismissible])->merge(['class'=>'alert alert-'.$validType,'role'=>$attributes->prepends("flash")]) }}  >
    {{ $message }}
    @if($slot->isNotEmpty())
    {{ $slot }}
    @endif
    @isset($note)
        <small>{{$note}}</small>
    @endisset
    @if($dismissible)
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
```

- Usage

```php
<x-alert type="danger" dismissible id="danger-alert" class="m-2" role="alert" >
    {{-- <x-slot:note>Developed by Bhushan</x-slot:note> --}}
    <x-slot name="note">Developed by Bhushan</x-slot>
    <h2> This is slot example</h2>
        <hr/>
        <p>lorem lapsum {{ $component->link("Search","https://google.com") }}</p>
</x-alert>
```

## Anonymous components

- Manually created view `resources\views\components\card.blade.php`

```php
@props([
    "title"=>"card title",
    "text"=>"Some quick example text to build on the card title and make up the bulk of the card's content.",
    "button"=>"Go somewhere",
    "image" => ""
])

<div class="card" style="width: 18rem;">
    <img src="{{$image}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$title}}</h5>
      <p class="card-text">{{$text}}</p>
      <a href="#" class="btn btn-primary">{{$button}}</a>
    </div>
</div>
```

- Usage

```php
@php
    $component = "card"
@endphp
<x-dynamic-component :component="$component" title="dynamic anonymous component" text="did not used component class" image="https://www.loksatta.com/wp-content/uploads/2024/07/New-Project-19-4.jpg?resize=310,174" />
```
