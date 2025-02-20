@props(['active' => false, 'href'])

<a href="{{ $href }}" {{ $attributes->merge([
    'class' => ($active 
        ? 'border-blue-500 text-white' 
        : 'border-transparent text-gray-200 hover:border-white hover:text-white') . 
        ' inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium'
]) }}>
    {{ $slot }}
</a>