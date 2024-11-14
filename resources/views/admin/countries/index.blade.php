<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Countries') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class=" mx-auto sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="bg-indigo-600 text-gray-200 m-2 p-2 rounded-md" id="alert">{{session('message')}}</div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
        <div class="flex justify-end">
            <a href="{{ route('countries.create')}}" class="py-2 px-4 m2 bg-green-500 hover:bg-green-300 text-gray-50 rounded-md">New Country</a>
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
                    Country Code
                </th>
                <th scope="col" class="px-6 py-3" >
                    Edit
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;?>
            @foreach ($countries as $country)


            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">{{ $loop->iteration }}</td>

                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{$country->name}}</div>
                    </div>
                </th>
                <td class="px-6 py-4">
                    {{$country->slug}}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        {{$country->country_code}}
                    </div>
                </td>
                <td class="px-6 py-4">
                    <!-- Modal toggle -->
                    <a href="{{route('categories.edit', $country->id)}}"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit |</a>
                    <form method="POST" action="{{ route('countries.destroy', $country->id) }}" x-data>
                        @csrf
                        @method('DELETE')

                        <a class="font-medium text-red-600 dark:text-red-500 hover:underline" href="{{ route('countries.destroy', $country->id) }}"
                                @click.prevent="$root.submit();">
                            Delete
                        </a>
                    </form>
                </td>
            </tr>
            @endforeach
<?php $no++; ?>

        </tbody>
    </table>
    <div class="px-5 mx-5">
        {{$countries->links()}}
    </div>


</div>


            </div>
        </div>
    </div>
</x-app-layout>
