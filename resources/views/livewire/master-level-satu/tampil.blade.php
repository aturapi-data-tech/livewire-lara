<div class="fixed inset-0 z-40 overflow-y-auto ease-out duration-400">

    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

        <!-- This element is to trick the browser into transition-opacity. -->
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​


        <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">

                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">
                    {{ $myTitle }}
                </h3>

                {{-- Close Modal --}}
                <button wire:click="closeModalTampil()"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>

            </div>


            <form>

                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">

                    <div>
                        <x-input-label for="province_id" :value="__('Kode Provinsi')" />
                        <x-text-input class="block w-full mt-1" :value="old('name')" required autofocus
                            autocomplete="province_id" wire:model="province_id" disabled />

                        @error('province_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Nama Provinsi')" />
                        <x-text-input class="block w-full mt-1" :value="old('name')" required autofocus autocomplete="name"
                            wire:model="name" disabled />

                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                </div>



                <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                    <x-light-button wire:click="closeModalTampil()" type="button">Keluar</x-light-button>
                </div>


            </form>

        </div>



    </div>

</div>
