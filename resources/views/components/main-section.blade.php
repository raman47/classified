<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Categories</h1>
      </div>
      <div class="flex flex-wrap -m-4">
        @foreach ($categories as $category)
        {{-- <a href="{{ route('frontend.subcategories', ['id' => $category->id]) }}"> --}}
            <div class="xl:w-1/3 md:w-1/2 p-4">
                <div class="bg-gray-200 border border-gray-200 p-6 rounded-lg">
                    <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                        <img class="w-10 h-10" src="{{ asset('storage/' . $category->image) }}" alt="Category Image">
                    </div>
                    <a href="{{ route('frontend.subcategories', ['id' => $category->id]) }}">
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">{{$category->name}}</h2>
                    </a>
                    <p class="leading-relaxed text-base">100 Ads.</p>
                </div>
            </div>
        {{-- </a> --}}
        @endforeach
      </div>
      <button class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
    </div>
  </section>
