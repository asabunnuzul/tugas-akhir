<x-siakad.card>
    <x-siakad.header>Atur Siswa PKL</x-siakad.header>

    <div class="md:grid md:grid-cols-3 md:gap-2 md:space-y-0 mb-3">
        <x-siakad.tahun wire:model.live='tahun' />
        <x-siakad.list-hubin :listHubin="$listHubin" wire:model.live='hubin_id' />
        <x-siakad.list-user :listUser="$listUserHubin" wire:model.live="user_hubin_id" label="Pembimbing Hubin" />
    </div>
    <div class="md:grid md:grid-cols-3 md:gap-2 md:space-y-0 mb-3">
        <x-siakad.list-user :listUser="$listPembimbing" wire:model.live="pembimbing_id" label="Pembimbing Sekolah" />
        <x-siakad.kelas :listKelas="$listKelas" wire:model.live='kelas_id' disabled />
        <x-siakad.list-siswa :listSiswa="$this->listSiswa" wire:model.live="nis" disabled />
    </div>
    <div class="my-3 flex gap-2">
        <x-siakad.button wire:click.prevent='simpan' spinner="simpan" wire:loading.attr='disabled' label='simpan' />
        <x-siakad.button red label="Batal" href="{{ route('data-siswa-pkl') }}" wire:navigate />
    </div>
</x-siakad.card>
