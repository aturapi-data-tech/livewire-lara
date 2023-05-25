<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="px-4 pt-6">

        <div
            class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <!-- Card header -->



            <div class="w-full mb-1">

                <div class="">
                    {{-- text --}}

                    <div class="mb-5">
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $myTitle }}</h3>
                        <span class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $mySnipt }}</span>
                    </div>
                    {{-- end text --}}

                    <div class="md:flex md:justify-between">
                        {{-- search --}}
                        <div class="relative pointer-events-auto dark:bg-slate-900 md:w-1/2">
                            <div class="absolute inset-y-0 left-0 flex items-center p-5 pl-3 pointer-events-none">
                                <svg width="24" height="24" fill="none" aria-hidden="true"
                                    class="flex-none mr-3">
                                    <path d="m19 19-3.5-3.5" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <circle cx="11" cy="11" r="6" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></circle>
                                </svg>
                            </div>
                            <x-text-input id="simpleSearch" name="namesimpleSearch" type="text" class="p-2 pl-10"
                                autofocus autocomplete="simpleSearch" placeholder="Cari Data"
                                wire:model.lazy="search" />
                        </div>
                        {{-- end search --}}


                        {{-- two button --}}
                        <div class="flex justify-between mt-2 md:mt-0">
                            <x-primary-button wire:click="create()" class="flex justify-center flex-auto">
                                <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Tambah Data {{ $myProgram }}
                            </x-primary-button>

                            <x-dropdown align="right" width="48" class="">
                                <x-slot name="trigger" class="">
                                    <x-alternative-button class="inline-flex">
                                        <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg>
                                        Tampil ({{ $limitPerPage }})
                                    </x-alternative-button>
                                </x-slot>

                                {{-- Open user menu content --}}
                                <x-slot name="content">

                                    @foreach ($myLimitPerPages as $myLimitPerPage)
                                        <x-dropdown-link wire:click="changeLimitPerPage({{ $myLimitPerPage }})">
                                            {{ __($myLimitPerPage) }}
                                        </x-dropdown-link>
                                    @endforeach


                                </x-slot>

                            </x-dropdown>
                        </div>
                        {{-- end two button --}}

                    </div>




                    @if ($isOpen)
                        @include('livewire.master-level-satu.create')
                    @endif
                    @if ($tampilIsOpen)
                        @include('livewire.master-level-satu.tampil')
                    @endif

                </div>



                <!-- Table -->
                <div class="flex flex-col mt-6">
                    <div class="overflow-x-auto rounded-lg">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden shadow sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 table-auto dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="w-2/12 px-4 py-3">Kode Provinsi</th>
                                            <th scope="col" class="px-4 py-3">Nama Provinsi</th>

                                            <th scope="col" class="w-8 px-4 py-3 text-center">Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-800">


                                        @foreach ($provinces as $province)
                                            <tr class="border-b group dark:border-gray-700">
                                                <th scope="row"
                                                    class="px-4 py-3 font-medium text-gray-900 group-hover:bg-gray-100 group-hover:text-blue-700 whitespace-nowrap dark:text-white">
                                                    {{ $province->id }}</th>
                                                <td class="px-4 py-3 group-hover:bg-gray-100 group-hover:text-blue-700">
                                                    {{ $province->name }}</td>

                                                <td
                                                    class="flex items-center justify-center px-4 py-3 group-hover:bg-gray-100 group-hover:text-blue-700">

                                                    <div>
                                                        <!-- Dropdown Action menu -->
                                                        <x-light-button id="dropdownDefaultButton"
                                                            data-dropdown-toggle="dropdown{{ $province->id }}"
                                                            data-dropdown-trigger="click"
                                                            data-dropdown-placement="left">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            </svg>
                                                        </x-light-button>
                                                        <!-- Dropdown Action Open menu -->
                                                        <div id="dropdown{{ $province->id }}"
                                                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                                aria-labelledby="dropdownHoverButton">
                                                                <li>
                                                                    <x-dropdown-link
                                                                        wire:click="tampil({{ $province->id }})">
                                                                        {{ __('Tampil | ' . $province->name) }}
                                                                    </x-dropdown-link>
                                                                </li>
                                                                <li>
                                                                    <x-dropdown-link
                                                                        wire:click="edit({{ $province->id }})">
                                                                        {{ __('Ubah') }}
                                                                    </x-dropdown-link>
                                                                </li>
                                                                <li>
                                                                    <x-dropdown-link
                                                                        wire:click="delete({{ $province->id }})">
                                                                        {{ __('Hapus') }}
                                                                    </x-dropdown-link>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <!-- End Dropdown Action Open menu -->

                                                    </div>
                                                    <!-- End Dropdown Action menu -->

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                                @if ($provinces->count() == 0)
                                    <div class="w-full p-4 text-sm text-center text-gray-500 dark:text-gray-400">
                                        {{ 'Data ' . $myProgram . ' Tidak ditemukan' }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card Footer -->
                <div class="flex items-center justify-end pt-3 sm:pt-6">
                    {{-- {{ $provinces->links() }} --}}
                    {{ $provinces->links('vendor.livewire.tailwind') }}
                </div>


            </div>

        </div>

    </div>