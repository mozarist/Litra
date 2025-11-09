@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-zinc-950']) }}>
        {{ $status }}
    </div>
@endif
