# Component

## create component using command

```bash
php artisan make:component Alert
```

## Component class file `app\View\Components\Alert.php`

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

```bash
<div class="alert alert-{{ $type }}">
    {{ $message }}
</div>
```

2.

```bash
<div class="alert alert-{{ $validType }}">
    {{ $message }}
</div>
```

## Usage in `resources\views\custom\welcome-2.blade.php`

```bash
<x-alert type="success" message="Operation successful!" />
```

1. Use php variable

```bash
@php
$message="php variabled message";
@endphp
<x-alert type="delete" :$message />
```

## Different scenario

1. Attributes

- component

```bash
<div class="alert alert-{{ $validType }}" {{ $attributes }}>
    {{ $message }}
</div>
```

- usage

```bash
<x-alert type="danger" message="Danger message" id="dager-alert" class="m-2" />
```

2. Merged Attribute only class

- component

```bash
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

- usage

```bash
<x-alert type="danger" message="Danger message" id="danger-alert" class="m-2" role="alert" />

```

3. Conditional class

- Component view

```bash
<div  {{ $attributes->class(['alert-dismissible fade show'=>$dismissible])->merge(['class'=>'alert alert-'.$validType,'role'=>$attributes->prepends("flash")]) }}  >
    {{ $message }}
    @if($dismissible)
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
```

- Usage

```bash
<x-alert type="danger" dismissible message="Danger message" id="danger-alert" class="m-2" role="alert" />
```

## Slot

1. Component view

```bash
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

```bash
<x-alert type="danger" dismissible id="danger-alert" class="m-2" role="alert" >
    <h2> This is slot example</h2>
    <hr/>
    <p>lorem lapsum</p>
</x-alert>
```

3. Class

```bash
__construct($type, $message = "", public $dismissible = false)
```

## slot variable

```bash
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

```bash
<x-alert type="danger" dismissible id="danger-alert" class="m-2" role="alert" >
    {{-- <x-slot:note>Developed by Bhushan</x-slot:note> --}}
    <x-slot name="note">Developed by Bhushan</x-slot>
    <h2> This is slot example</h2>
    <hr/>
    <p>lorem lapsum</p>
</x-alert>
```

## html link in component

- In `app\View\Components\Alert.php`

```bash
public function link($text, $target)
{
    return new HtmlString("<a href='$target' class='text-link'>$text</a>");
}
```

- Component view

```bash
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

```bash
<x-alert type="danger" dismissible id="danger-alert" class="m-2" role="alert" >
    {{-- <x-slot:note>Developed by Bhushan</x-slot:note> --}}
    <x-slot name="note">Developed by Bhushan</x-slot>
    <h2> This is slot example</h2>
        <hr/>
        <p>lorem lapsum {{ $component->link("Search","https://google.com") }}</p>
</x-alert>
```

## anonymous components
