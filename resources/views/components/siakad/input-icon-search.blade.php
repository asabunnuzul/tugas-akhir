@props(['label' => '', 'type' => 'text', 'isLoading' => true])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>{{ $label }}</div>
    <div class="relative">
        <input type="{{ $type }}" {!! $attributes->merge([
            'class' =>
                'pl-10 pr-4 w-full border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none',
        ]) !!}>
        <div
            class="absolute inset-y-0 left-0 pl-3  
                    flex items-center  
                    pointer-events-none">
            <svg class="size-4 text-slate-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
            </svg>

        </div>
    </div>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    @if ($isLoading)
        <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
    @endif
</div>
