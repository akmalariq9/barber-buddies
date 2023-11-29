<!-- resources/views/components/button.blade.php -->
@props(['type' => 'button'])

<button {{ $attributes->merge(['class' => 'px-4 py-2 font-semibold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300 active:bg-blue-800']) }} type="{{ $type }}">
    {{ $slot }}
</button>
