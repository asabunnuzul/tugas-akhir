<div class="fixed inset-0 z-50 flex flex-col items-center justify-center text-xl font-semibold bg-white/20 backdrop-blur text-emerald-500"
    {{ $attributes }} wire:loading.flex>
    <div
        class="flex flex-col items-center justify-center p-20 space-y-5 bg-white border shadow-md rounded-xl border-emerald-500 shadow-emerald-500">
        <div class='w-full'>
            <div class='h-1.5 w-full bg-emerald-100 overflow-hidden rounded-md'>
                <div class='w-full h-full bg-emerald-500 progress left-right'></div>
            </div>
        </div>
        <div class="animate-bounce">
            Menyiapkan sistem . . .
        </div>
    </div>
</div>