@props(['listRole', 'isAlpine' => false])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>role</div>
    <select {{ $attributes }} class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">Pilih Role</option>
        @if ($isAlpine)
            <template x-for="role in $wire.listRole">
                <option x-text="role.role ?? role.nama" :value="role.role_id ?? role.id">
                </option>
            </template>
        @else
            @foreach ($listRole as $r)
                <option value="{{ $r->name }}">{{ $r->name }}</option>
            @endforeach
        @endif
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
</div>
