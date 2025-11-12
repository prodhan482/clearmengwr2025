@props(['label', 'name', 'value' => ''])
<div class="mb-4">
    <label class="block font-medium mb-1">{{ $label }}</label>
    <input type="text" name="{{ $name }}" value="{{ old($name, $value) }}" class="w-full border rounded p-2" />
</div>
