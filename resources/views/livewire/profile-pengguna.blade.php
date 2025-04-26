<div>
    <div class='my-10 space-y-5 md:grid md:grid-cols-2 md:gap-7 md:space-y-0'>
        <x-siakad.card>
            <form wire:submit.prevent='simpanNama' class="space-y-3">
                <x-siakad.header>nama pengguna</x-siakad.header>
                <x-siakad.input label="Ganti Nama" wire:model='nama' />
                <x-siakad.button label="Ganti Nama" spinner='simpanNama' wire:click.prevent='simpanNama' />
                <div class="my-2 text-slate-500"><span class="text-red-500">*</span>sesuaikan nama dan gelar anda jika
                    terdapat kekeliruan</div>
            </form>
        </x-siakad.card>

        <x-siakad.card>
            <x-siakad.header>update password</x-siakad.header>
            <form wire:submit.prevent='updatePassword' class="space-y-3">
                <x-siakad.input type='password' label='password lama' wire:model='old_password' />
                <x-siakad.input type='password' label='password' wire:model='password' />
                <x-siakad.input type='password' label='konfirmasi password' wire:model='password_confirmation' />
                <x-siakad.button label='update password' type='password' spinner='updatePassword' />
            </form>
        </x-siakad.card>
    </div>
</div>
