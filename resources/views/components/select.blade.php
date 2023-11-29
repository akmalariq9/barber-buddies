<!-- resources/views/components/select.blade.php -->
@props(['name', 'options', 'selected' => null])

<select {{ $attributes->merge(['id' => $name, 'name' => $name, 'class' => 'block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:border-blue-300 sm:text-sm']) }}>
    @foreach ($options as $key => $value)
        <option value="{{ $key }}" {{ $key == $selected ? 'selected' : '' }}>
            {{ $value }}
        </option>
    @endforeach
</select>
