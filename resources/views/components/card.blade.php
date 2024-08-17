<div {{ $attributes->merge(['class' => 'card']) }}>
    <div {{ $attributes->merge(['class' => 'card-body']) }} >
        <h4>{{ $title }}</h4>
    </div>
    <hr>
    {{ $slot }}
</div>
