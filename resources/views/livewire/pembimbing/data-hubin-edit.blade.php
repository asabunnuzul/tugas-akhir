<x-siakad.card>
    <form wire:submit.prevent='simpan' class="space-y-3">
        <x-siakad.header>edit data hubin</x-siakad.header>
        <x-siakad.input label="Nama hubin" wire:model='nama' />
        <x-siakad.textarea label="alamat hubin" wire:model='alamat' rows="3" />
        <div class="flex gap-2">
            <x-siakad.button label="Update Data" spinner='simpan' type='submit' />
            <x-siakad.button label="Batal" red href="{{ route('data-hubin') }}" wire:navigate />
        </div>
    </form>
</x-siakad.card>
