@props(['list'])
<div 
    x-cloak 
    x-data="{
                filter: '',
                show: false,
                selected: null,
                nis: $wire.entangle('nis').live,
                focusedOptionIndex: null,
                options: {!! $list !!},
        
                close() { 
                    this.show = false;
                    this.filter = this.selectedName();
                    this.focusedOptionIndex = this.selected ? this.focusedOptionIndex : null;
                },

                open() { 
                    this.show = true; 
                    this.filter = '';
                },

                toggle() { 
                    if (this.show) {
                        this.close();
                    }
                    else {
                        this.open()
                    }
                },

                isOpen() { return this.show === true },

                selectedName() { 
                    this.nis = this.selected.nis;
                    return this.selected ? this.selected.siswa?.name : this.filter; 
                },

                classOption(id, index) {
                    const isSelected = this.selected ? (id == this.selected.siswa?.name) : false;
                    const isFocused = (index == this.focusedOptionIndex);
                    return {
                        'cursor-pointer w-full border-gray-100 border-b hover:bg-blue-50': true,
                        'bg-blue-100': isSelected,
                        'bg-blue-50': isFocused
                    };
                },
                
                filteredOptions() {
                    return this.options
                        ? this.options.filter(option => {
                            // return option.nis
                            return (option.siswa?.name.toLowerCase().indexOf(this.filter) > -1) 
                            // || (option.kelas?.nama.toLowerCase().indexOf(this.filter) > -1)
                            // || (option.nis.toLowerCase().indexOf(this.filter) > -1)
                        })
                    : {}
                },

                onOptionClick(index) {
                    this.focusedOptionIndex = index;
                    this.selectOption();
                },

                selectOption() {
                    if (!this.isOpen()) {
                        return;
                    }
                    this.focusedOptionIndex = this.focusedOptionIndex ?? 0;
                    const selected = this.filteredOptions()[this.focusedOptionIndex]
                    if (this.selected && this.selected.siswa?.name == selected.siswa?.name) {
                        this.filter = '';
                        this.selected = null;
                    }
                    else {
                        this.selected = selected;
                        this.filter = this.selectedName();
                    }
                    this.close();
                },
                
                focusPrevOption() {
                    if (!this.isOpen()) {
                        return;
                    }
                    const optionsNum = Object.keys(this.filteredOptions()).length - 1;
                    if (this.focusedOptionIndex > 0 && this.focusedOptionIndex <= optionsNum) {
                        this.focusedOptionIndex--;
                    }
                    else if (this.focusedOptionIndex == 0) {
                        this.focusedOptionIndex = optionsNum;
                    }
                },
                
                focusNextOption() {
                    const optionsNum = Object.keys(this.filteredOptions()).length - 1;
                    if (!this.isOpen()) {
                        this.open();
                    }
                    if (this.focusedOptionIndex == null || this.focusedOptionIndex == optionsNum) {
                        this.focusedOptionIndex = 0;
                    }
                    else if (this.focusedOptionIndex >= 0 && this.focusedOptionIndex < optionsNum) {
                        this.focusedOptionIndex++;
                    }
                }
            }" class="relative flex flex-col items-center">
    <div class="w-full">
        <div @click.away="close()" class="flex p-1 my-2 bg-white border border-gray-200 rounded">
            <input x-model="filter" x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @mousedown="open()"
                @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()"
                @keydown.arrow-down.prevent="focusNextOption()"
                class="w-full p-1 px-2 text-gray-800 outline-none appearance-none">
            <div class="flex items-center w-8 py-1 pl-2 pr-1 text-gray-300 border-l border-gray-200">
                <button @click.prevent="toggle()"
                    class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline x-show="!isOpen()" points="18 15 12 20 6 15"></polyline>
                        <polyline x-show="isOpen()" points="18 15 12 9 6 15"></polyline>
                    </svg>

                </button>
            </div>
        </div>
    </div>
    <div x-show="isOpen()"
        class="absolute z-40 w-full overflow-y-auto bg-white rounded shadow top-100 lef-0 max-h-select mt-14">
        <div class="flex flex-col w-full">
            <template x-for="(option, index) in filteredOptions()" :key="index">
                <div @click.prevent="onOptionClick(index)" :class="classOption(option.nis, index)"
                    :aria-selected="focusedOptionIndex === index">
                    <div
                        class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent hover:border-teal-100">
                        <div class="flex items-center w-full">
                            <div class="mx-2 -mt-1"><span x-text="option.siswa?.name"></span>
                                <div class="w-full -mt-1 text-xs font-normal text-gray-500 normal-case truncate"
                                    x-text="option.kelas?.nama"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>