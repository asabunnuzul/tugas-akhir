<div x-bind:class="open ? ' translate-x-0 transition-all transform duration-500' 
: ' -translate-x-full transition-all transform duration-500 '" class="fixed top-0 z-40 w-full h-full bg-transparent" @keydown.window.escape="open = false" x-cloak>
    <div class="h-full py-10 overflow-y-auto bg-sky-400 shadow-md w-80 shadow-sky-100">
        <button @click="open = false" class="relative -top-5 -right-64">
            <svg class="rounded-full size-7 text-sky-100 active:text-sky-200" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m13 7-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </button>
        <x-sidebar.layout />
    </div>
</div>