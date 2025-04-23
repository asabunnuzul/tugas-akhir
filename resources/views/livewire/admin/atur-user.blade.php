<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atur User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="md:grid md:grid-cols-2 md:gap-2 md:space-y-0 mb-3">

                        <!-- username Address -->
                        <x-listuser :listUser="$listUser" wire:model="user_id" label="User" />

                        <!-- Password -->
                        <x-listrole :listRole="$listRole" wire:model="role" />
                    </div>


                    <div class="my-3">
                        <x-primary-button wire:click.prevent='simpan' wire:loading.attr='disabled' class="ms-3">
                            {{ __('Simpan') }}
                        </x-primary-button>
                    </div>
                    <div class="my-3">
                        <x-skeleton />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
