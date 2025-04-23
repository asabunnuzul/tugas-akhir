<div class="flex flex-col space-y-1 capitalize text-md text-slate-600" wire:ignore>
    <div>Skor</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">Pilih Skor</option>
        @foreach ($list as $item)
            <option value="{{ $item->id }}">{{ $item->keterangan }} ({{ $item->skor }})</option>
        @endforeach
    </select>
</div>
