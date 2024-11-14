<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SubCategories') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class=" mx-auto sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="bg-indigo-600 text-gray-200 m-2 p-2 rounded-md" id="alert">{{ session('message') }}</div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                        <div class="flex justify-end">
                            <a href="{{ route('subcategories.create') }}"
                                class="py-2 px-4 m2 bg-green-500 hover:bg-green-300 text-gray-50 rounded-md">New
                                Sub Category</a>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    {{-- <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
        <div>
            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                <span class="sr-only">Action button</span>
                Action
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate account</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete User</a>
                </div>
            </div>
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="table-search-users" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
        </div>
    </div> --}}
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Slug
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Edit
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($subcategories as $sub_category)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">{{ $loop->iteration }}</td>

                                    <th scope="row"
                                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="ps-3">
                                            <div class="text-base font-semibold">{{ $sub_category->name }}</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $sub_category->slug }}
                                    </td>
                                    <td class="px-6 py-4">{{ $sub_category->category->name ?? 'No Category' }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $sub_category->image) }}" alt="Category Image">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <!-- Modal toggle -->
                                        <a href="{{ route('subcategories.edit', $sub_category->id) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit
                                            |</a>
                                        <form method="POST" action="{{ route('subcategories.destroy', $sub_category->id) }}" x-data>
                                            @csrf
                                            @method('DELETE')

                                            <a class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                                href="{{ route('subcategories.destroy', $sub_category->id) }}"
                                                @click.prevent="$root.submit();">
                                                Delete
                                            </a>
                                        </form>
                                    </td>
                                    @empty
                                    <tr>
                                        <td colspan="5"><div class="m-4 p-4 text-center">No Sub Categories Found!</div></td>
                                    </tr>



                                </tr>

                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
