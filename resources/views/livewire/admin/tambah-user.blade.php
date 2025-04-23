<x-siakad.card>
    <x-siakad.header>Tambah User</x-siakad.header>

    <form wire:submit.prevent='simpan'>

        <div class="md:grid md:grid-cols-2 md:gap-2 md:space-y-0 mb-3 pt-5">
            <x-siakad.input wire:model='nama' id="nama" label="nama" />
            <x-siakad.input wire:model='username' id="username" label="username" />
        </div>

        <div class="md:grid md:grid-cols-2 md:gap-2 md:space-y-0 mb-3">
            <x-siakad.input wire:model='password' type="password" id="password" label="password" />
            <x-siakad.input wire:model='password_confirmation' type="password" id="password_confirmation"
                label="konfirmasi password" />
        </div>

        <div class="my-3">
            <x-siakad.button type="submit" wire:click.prevent='simpan' wire:loading.attr='disabled' spinner="simpan"
                label="simpan" />
        </div>
    </form>
</x-siakad.card>
