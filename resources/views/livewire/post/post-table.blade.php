<div class="px-4 pt-6">
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <div class="w-full mb-1">
            <div class="sm:flex">



                <div class="items-center mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <div class="mb-4 lg:mb-0">
                        <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Post</h3>
                        <span class="text-base font-normal text-gray-500 dark:text-gray-400">Tambahkan data post</span>
                    </div>
                </div>

                <div class="flex items-center ml-auto space-x-1 justify-right sm:space-x-3">




                    <label for="users-search" class="sr-only">Search</label>
                    <div class="relative mt-1 lg:w-64 xl:w-96">
                        <input type="text" name="email" id="users-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search for users" wire:model="search">
                    </div>



                    <x-primary-button wire:click="create()" class="inline-flex">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add user
                    </x-primary-button>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <x-alternative-button class="inline-flex">
                                <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                                Show ({{ $limitPerPage }})
                            </x-alternative-button>
                        </x-slot>

                        {{-- Open user menu content --}}
                        <x-slot name="content">

                            <x-dropdown-link wire:click="changeLimitPerPage(5)">
                                {{ __('5') }}
                            </x-dropdown-link>
                            <x-dropdown-link wire:click="changeLimitPerPage(10)">
                                {{ __('10') }}
                            </x-dropdown-link>
                            <x-dropdown-link wire:click="changeLimitPerPage(100)">
                                {{ __('100') }}
                            </x-dropdown-link>


                        </x-slot>

                    </x-dropdown>

                    @if ($isOpen)
                        @include('livewire.post.create')
                    @endif
                </div>
            </div>
            <!-- Table -->
            <div class="flex flex-col mt-6">
                <div class="overflow-x-auto rounded-lg">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">Product name</th>
                                        <th scope="col" class="px-4 py-3">Category</th>
                                        <th scope="col" class="px-4 py-3">Brand</th>
                                        <th scope="col" class="px-4 py-3">Description</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800">


                                    @foreach ($posts as $post)
                                        <tr class="border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $post->id }}</th>
                                            <td class="px-4 py-3">{{ $post->title }}</td>
                                            <td class="px-4 py-3">{{ $post->body }}</td>
                                            <td class="flex items-center justify-end px-4 py-3">
                                                <x-dropdown align="right" width="48">
                                                    <x-slot name="trigger">
                                                        <button
                                                            class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                                            type="button">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            </svg>
                                                    </x-slot>

                                                    {{-- Open user menu content --}}
                                                    <x-slot name="content">

                                                        <x-dropdown-link wire:click="edit({{ $post->id }})">
                                                            {{ __('Show') }}
                                                        </x-dropdown-link>
                                                        <x-dropdown-link wire:click="edit({{ $post->id }})">
                                                            {{ __('Edit') }}
                                                        </x-dropdown-link>
                                                        <x-dropdown-link wire:click="delete({{ $post->id }})">
                                                            {{ __('Delete') }}
                                                        </x-dropdown-link>


                                                    </x-slot>

                                                </x-dropdown>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Footer -->
            <div class="flex items-center justify-end pt-3 sm:pt-6">
                {{ $posts->links() }}
            </div>


        </div>

    </div>
