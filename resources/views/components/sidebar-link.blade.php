@props(['href', 'active' => false])

<a href="{{ $href }}" {{ $attributes->merge([
    'class' => 'block px-4 py-3 hover:bg-white/10 transition-colors duration-200 ' . 
        ($active 
            ? 'bg-white/20 text-white' 
            : 'text-blue-100 hover:text-white')
]) }}>
    {{ $slot }}
</a>