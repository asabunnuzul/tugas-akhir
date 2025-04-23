@props(['listPermission', 'isAlpine' => false, 'isAdmin' => false])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>permission</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">Pilih Permission</option>
        @if ($isAlpine)
            <template x-for="permission in $wire.listPermission">
                <option x-text="permission.permission ?? permission.name"
                    :value="permission.permission_id ?? permission.id">
                </option>
            </template>
        @else
            @foreach ($listPermission as $r)
                <option value="{{ $r->name }}">{{ $r->name }}</option>
            @endforeach
        @endif
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
