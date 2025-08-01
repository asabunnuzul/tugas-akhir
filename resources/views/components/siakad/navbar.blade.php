<nav
    class="fixed top-0 left-0 w-full px-3 py-2 border  border-slate-300 backdrop-blur bg-white/80 ">
    <div class="flex items-center justify-between lg:justify-end">
        @unlessrole('Siswa')
            <div @click="open = true"
                class="relative flex items-center pl-3 cursor-pointer lg:hidden hover:text-emerald-700 text-emerald-500 text-md focus:text-emerald-600 active:text-emerald-600">
                <svg class="size-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                </svg>
                Menu
            </div>
        @endunlessrole
        @role('Siswa')
            <a href="{{ route('dashboard') }}" wire:navigate
                class="relative flex items-center pl-3 cursor-pointer lg:hidden hover:text-emerald-700 text-emerald-500 text-md focus:text-emerald-600 active:text-emerald-600">
                <svg class="size-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                </svg>
                Menu
            </a>
        @endrole
        <div
            class="font-extrabold text-transparent place-items-end text-md lg:text-xl bg-gradient-to-r bg-clip-text from-slate-500 via-gray-500 to-zinc-500 animate-text">
            Sistem Praktik Lapangan
        </div>
    </div>
</nav>
