<x-siakad.card>
    <div class="mb-20">
        <x-siakad.header>upload data siswa</x-siakad.header>
        <x-siakad.input class="p-3" type='file' label='Pilih File Excel' wire:model='file_upload' />
        <div class="mt-3">
            <x-siakad.button icon='upload' label='Upload' positive wire:click.prevent='upload_siswa' spinner='upload_siswa'/>
        </div>
    </div>
    <x-siakad.skeleton />
</x-siakad.card>    