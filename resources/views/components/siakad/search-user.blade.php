@props(['label' => '', 'urut' => 0])
<div :key="$urut">
    <div wire:ignore class="flex flex-col space-y-1 capitalize text-md text-slate-600">
        <div>{{ $label }}</div>
        <select {{ $attributes }}>
        </select>
    </div>
</div>
