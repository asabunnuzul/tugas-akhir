<x-siakad.card>
    <x-siakad.header>print nilai PKL</x-siakad.header>
    <form action="{{ route('print-nilai.print') }}" method="GET" target="__blank">
        <div class="py-3 space-y-2 md:grid md:grid-cols-3 md:gap-2 md:space-y-0">
            <x-siakad.tahun wire:model.live='tahun' name="tahun" />
            <div class="col-span-2">
                <x-siakad.list-siswa withKelas="true" :listSiswa="$this->listSiswa" wire:model='nis' name="nis" />
            </div>
        </div>
        <x-siakad.button type="submit" label="print" icon="printer" />
    </form>
</x-siakad.card>
