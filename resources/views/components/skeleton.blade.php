<div class="flex flex-col items-center justify-center lg:my-20 my-7" {{ $attributes }} wire:loading.flex>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="size-6 animate-spin">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M7.5 3.75H6A2.25 2.25 0 0 0 3.75 6v1.5M16.5 3.75H18A2.25 2.25 0 0 1 20.25 6v1.5m0 9V18A2.25 2.25 0 0 1 18 20.25h-1.5m-9 0H6A2.25 2.25 0 0 1 3.75 18v-1.5M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
    </svg>

    {{-- <div class='w-[90%]'>
        <div class='h-1.5 w-full bg-emerald-100 overflow-hidden rounded-md'>
            <div class='w-full h-full bg-emerald-500 progress left-right'></div>
        </div>
    </div> --}}
</div>
