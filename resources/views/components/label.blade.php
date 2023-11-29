<!-- resources/views/components/label.blade.php -->
@props(['for'])

<label for="{{ $for }}" {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $slot }}
</label>
