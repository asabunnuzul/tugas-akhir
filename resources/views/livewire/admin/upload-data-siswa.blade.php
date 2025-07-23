<x-siakad.card>
    <form class="mb-20" method="POST" action="{{ route('upload-data-siswa-simpan') }}" enctype="multipart/form-data">
        @csrf
        <x-siakad.header>upload data siswa</x-siakad.header>
        <x-siakad.input class="p-3" type='file' label='Pilih File Excel' name="file_upload" wire:model='file_upload' />
        <div class="mt-3">
            <x-siakad.button icon='upload' label='Upload' type="submit" />
        </div>
    </form>
    <x-siakad.skeleton />
</x-siakad.card>
