<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>ekstrakurikuler</div>
    <select
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none"
        {{ $attributes }}>
        <option value="">Pilih Ekstrakurikuler</option>
        @foreach ($listEkstrakurikuler as $ekstra)
            <option value="{{ $ekstra->ekstrakurikuler_id ?? $ekstra->id }}">
                {{ $ekstra->ekstrakurikuler?->nama ?? $ekstra->nama }}</option>
        @endforeach
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
