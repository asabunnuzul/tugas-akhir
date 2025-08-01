@props(['label' => '', 'type' => 'text', 'isLoading' => true, 'disabled' => false])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>{{ $label }}</div>
    <input type="{{ $type }}" {!! $attributes->merge([
        'class' =>
            'border rounded-md border-slate-200 focus:ring focus:ring-slate-300 focus:border-none ' .
            ($disabled ? ' bg-gray-200 ' : ''),
        'disabled' => $disabled ? true : false,
    ]) !!}>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    @if ($isLoading)
        <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
    @endif
</div>
