<div class="px-5">
    <div class="flex flex-col items-center text-gray-100">
        @if (auth()->user()->foto)
            <img src="{{ asset('logo.png') }}"
                class='object-cover object-top border-2 rounded-full w-28 h-28 border-slate-500' alt='foto' />
        @else
            <svg class="size-32" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        @endif
        <h1 class="block py-3 text-lg font-bold text-gray-100">{{ auth()->user()->name }}</h1>
    </div>
    <x-sidebar.link route="dashboard" label="dashboard" wire:navigate />
    @unlessrole('Siswa')
        <x-sidebar.link route="profile-pengguna" label="profile pengguna" wire:navigate />
    @endunlessrole

    @role('Admin')
        <x-sidebar.admin />
    @endrole

    @role('Pembimbing')
        <x-sidebar.pembimbing />
    @endrole

    @role('Hubin')
        <x-sidebar.hubin />
    @endrole

    @role('Siswa')
        <x-sidebar.siswa />
    @endrole

    <form method="POST" action="{{ route('logout') }}" class="my-10">
        @csrf
        <button type="submit"
            class="relative flex items-center pl-3 font-semibold capitalize border-l cursor-pointer border-slate-300 hover:text-slate-500 text-md text-slate-500 hover:border-slate-500">log
            out</button>
    </form>
</div>
