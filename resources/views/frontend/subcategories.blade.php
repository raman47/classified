<x-main-layout>
    <x-slot name="header">
        <x-main-header></x-main-header>
    </x-slot>


    <div class="bg-white px-4 py-12 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl">
            <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">All Sub Categories</h1>
            </div>


            <ul role="list" class="divide-y divide-gray-100">
                <?php
                    // echo '<pre>';
                    // print_r($all_subcategories->toArray());
                    // exit();
                    ?>
                @foreach ($all_subcategories as $all_subcategory)
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                    {{-- <img class="size-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt=""> --}}
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm/6 font-semibold text-gray-900">{{$all_subcategory->name}}</p>
                        <p class="mt-1 truncate text-xs/5 text-gray-500">{{ $all_subcategory->category->name}}</p>
                    </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm/6 text-gray-900"><button class="inline-flex items-center bg-green-500 border-0 py-1 px-3 focus:outline-none hover:bg-green-200 rounded text-base text-gray-50 font-semibold mt-4 md:mt-0 md:ml-4">View Ads
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                          <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                      </button></p>
                    <p class="mt-1 text-xs/5 text-gray-500">10 <time datetime="2023-01-23T13:23Z">Ads</time></p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
      </div>


    <x-main-footer></x-main-footer>
</x-main-layout>
