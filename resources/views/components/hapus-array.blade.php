@props(['pertama', 'kedua', 'ketiga'])
<div {{ $attributes }} wire:loading.remove
    wire:target="hapus(['{{ $pertama }}', '{{ $kedua }}', '{{ $ketiga ?? null }}'])" x-data="{ 'showModal': false }"
    @keydown.escape="showModal = false" @keydown.enter="$wire.hapus(['{{ $pertama }}', '{{ $kedua }}', '{{ $ketiga ?? null }}'])" x-cloak>
    <!-- Trigger for Modal -->
    <button type="button" @click="showModal = true">
        <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
        </svg>
    </button>

    <!-- Modal -->
    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
        x-show="showModal">
        <!-- Modal inner -->
        <div class="max-w-3xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg" @click.away="showModal = false"
            x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100">
            <!-- Title / Close-->
            <div class="flex items-center justify-between">
                <h5 class="mr-3 text-slate-700 max-w-none">Peringatan</h5>

                <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- content -->
            <div class="py-5">
                Anda Yakin Menghapus ?
                <div class="flex space-x-3">
                    <button type="button"
                        class="z-50 p-2 text-white bg-red-500 border rounded-md cursor-pointer border-slate-100 hover:bg-red-600 focus:ring focus:ring-red-600 hover:ring hover:ring-red-600"
                        @click="$wire.hapus(['{{ $pertama }}', '{{ $kedua }}', '{{ $ketiga ?? null }}']), showModal = false">
                        Ya, Hapus
                    </button>
                    <button type="button"
                        class="z-50 p-2 text-white bg-gray-800 border rounded-md cursor-pointer border-slate-100 hover:bg-gray-800 focus:ring focus:ring-gray-800 hover:ring hover:ring-gray-800"
                        @click="showModal = false">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>