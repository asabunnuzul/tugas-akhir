@props(['isSholat' => false, 'listKehadiran' => arrayKehadiran()])
<select {{ $attributes }}
    class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none text-md disabled:bg-gray-200">
    <option value="">Pilih Kehadiran</option>
    @foreach ($listKehadiran as $hadir)
        <option value="{{ $hadir->id }}">{{ $hadir->nama }}</option>
    @endforeach
</select>
