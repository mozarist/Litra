@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-zinc-500 focus:border-zinc-700 focus:outline-none focus:ring-zinc-600 rounded-md shadow-sm']) }}>
