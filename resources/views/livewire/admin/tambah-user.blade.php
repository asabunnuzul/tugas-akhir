<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="md:grid md:grid-cols-2 md:gap-2 md:space-y-0 mb-3">

                        <!-- username Address -->
                        <div>
                            <x-input-label for="nama" :value="__('Nama')" />
                            <x-text-input wire:model="nama" id="nama" class="block mt-1 w-full"
                                type="text" name="nama" required autofocus autocomplete="nama" />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="username" :value="__('username')" />

                            <x-text-input wire:model="username" id="username" class="block mt-1 w-full"
                                type="text" name="username" required autocomplete="current-username" />

                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>
                    </div>

                    <div class="md:grid md:grid-cols-2 md:gap-2 md:space-y-0 mb-3">

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                                type="password" name="password" required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Konfirmasi Password')" />

                            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                                type="password" name="password_confirmation" required autocomplete="current-password_confirmation" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <div class="my-3">
                        <x-primary-button wire:click.prevent='simpan' wire:loading.attr='disabled' class="ms-3">
                            {{ __('Tambahkan') }}
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
