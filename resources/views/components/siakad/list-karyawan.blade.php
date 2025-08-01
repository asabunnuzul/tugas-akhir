@props(['label' => 'Pilih Karyawan', 'listUser', 'isAlpine' => false, 'isLoading' => true])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>{{ $label }}</div>
    <select {{ $attributes }}
        class="border rounded-md  border-slate-200 focus:ring focus:ring-slate-300 focus:border-none">
        <option value="">Pilih </option>
        @if ($isAlpine)
            <template x-for="user in $wire.listUser">
                <option x-text="user.user ?? user.nama" :value="user.user_id ?? user.id">
                </option>
            </template>
        @else
            @foreach ($listUser as $user)
                <option value="{{ $user->user_id ?? $user->id }}">{{ $user->guru?->name ?? $user->name }}</option>
            @endforeach
        @endif
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    @if ($isLoading)
        <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
    @endif
</div>
