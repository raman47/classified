<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Sub Category') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class=" mx-auto sm:px-6 lg:px-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                        <div class="flex justify-start">
                            <a href="{{ route('childcategories.index')}}" class="py-2 px-4 m2 bg-red-700 hover:bg-red-300 text-gray-50 rounded-md">Back</a>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-8 mt-8">
                    <form action="{{route('childcategories.update', $child_category->id)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Update Child Category</h2>
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-4">
                                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="name" value="{{$child_category->name}}" id="name" autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" />
                                                @error('name')
                                                <span class="error">{{$message}}</span>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>

                                    <div class="sm:col-span-4">
                                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Sub Category</label>
                                        <div class="mt-2">
                                            {{-- <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"> --}}
                                                {{-- <input type="text" name="name" id="name" autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" > --}}
                                                <select name="sub_category_id">
                                                    @foreach ($sub_categories as $subcategory)
                                                        <option value="{{$subcategory->id}}" {{$subcategory->id == $child_category->sub_category_id ? 'selected' : ''}}>{{$subcategory->name}}</option>
                                                    @endforeach
                                                </select>
                                            {{-- </div> --}}
                                            @error('sub_category_id') <span class="error">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Child Category Image</label>
                                        <div class="w-full m-2 p-2">
                                            <img class="h-32 w-32" src="{{ asset('storage/' . $child_category->image) }}">
                                        </div>
                                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                            <input type="file" id="image" name="image">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                                                <div class="flex justify-start">
                                                    <button type="submit" class="py-2 px-4 m2 bg-green-500 hover:bg-green-300 text-gray-50 rounded-md">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
