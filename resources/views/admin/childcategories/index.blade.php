<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Child Categories') }}
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
                            <a href="{{ route('childcategories.create') }}"
                                class="py-2 px-4 m2 bg-green-500 hover:bg-green-300 text-gray-50 rounded-md">New
                                Child Category</a>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

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
                                    Sub Category
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

                            @forelse ($childcategories as $child_category)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">{{ $loop->iteration }}</td>

                                    <th scope="row"
                                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="ps-3">
                                            <div class="text-base font-semibold">{{ $child_category->name }}</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $child_category->slug }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $child_category->sub_category->name ?? 'No Sub Category' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $child_category->image) }}" alt="Category Image">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <!-- Modal toggle -->
                                        <a href="{{ route('childcategories.edit', $child_category->id) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit
                                            |</a>
                                        <form method="POST" action="{{ route('childcategories.destroy', $child_category->id) }}" x-data>
                                            @csrf
                                            @method('DELETE')

                                            <a class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                                href="{{ route('childcategories.destroy', $child_category->id) }}"
                                                @click.prevent="$root.submit();">
                                                Delete
                                            </a>
                                        </form>
                                    </td>
                                    @empty
                                    <tr>
                                        <td colspan="5"><div class="m-4 p-4 text-center">No Child Categories Found!</div></td>
                                    </tr>



                                </tr>

                            @endforelse


                        </tbody>
                    </table>
                    <div class="px-5 mx-5">
                        {{$childcategories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
