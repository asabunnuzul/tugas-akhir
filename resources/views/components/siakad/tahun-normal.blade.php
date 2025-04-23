<div class="flex flex-col space-y-1 capitalize text-slate-600 text-md">
    <div>tahun</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">Pilih Tahun</option>
        @for ($i = 2022; $i < date('Y + 1'); $i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
