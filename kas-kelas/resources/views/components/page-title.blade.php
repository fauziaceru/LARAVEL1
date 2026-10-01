@props(['description' => null])

<header>
    <h1>{{ $slot }}</h1>
    @if ($description)
        <p>{{ $description }}</p>
    @endif
</header>