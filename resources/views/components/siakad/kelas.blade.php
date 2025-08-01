@props(['label' => 'kelas', 'listKelas', 'isAlpine' => false, 'disabled' => false])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>{{ $label }}</div>
    <select
        class="border rounded-md border-slate-200 focus:ring focus:ring-slate-300 focus:ring focus:ring-emerald-300 focus:border-none {{ $disabled ? 'bg-gray-200' : '' }}"
        {{ $attributes }} {{ $disabled ? 'disabled' : '' }}>
        <option value="">Pilih kelas</option>
        @if ($isAlpine)
            <template x-for="kelas in $wire.listKelas">
                <option x-text="kelas.kelas ?? kelas.nama" :value="kelas.kelas_id ?? kelas.id">
                </option>
            </template>
        @else
            @foreach ($listKelas as $kelas)
                <option value="{{ $kelas->kelas_id ?? $kelas->id }}">{{ $kelas->kelas->nama ?? $kelas->nama }}</option>
            @endforeach
        @endif
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
