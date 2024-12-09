<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
          <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </svg>
        <span class="ml-3 text-xl">Classified</span>
      </a>
      <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
        <a href="{{route('home.page')}}" class="mr-5 hover:text-gray-900">Home</a>
        <a class="mr-5 hover:text-gray-900">All Ads</a>
        <a class="mr-5 hover:text-gray-900">Stores</a>
        <a class="mr-5 hover:text-gray-900">Contact</a>

        @guest
            <a href="{{route('login')}}" class="mr-5 hover:text-gray-900">Login</a>
            <a href="{{route('register')}}" class="mr-5 hover:text-gray-900">Register</a>
        @endguest
        @auth


        <div @click.away="open = false" class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="mr-5 hover:text-gray-900">
                <span class="font-bold">{{ Auth::user()->name }}</span>
                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0  mt-2 origin-top-right rounded-md shadow-lg">
                <div class="px-5 py-2 bg-white rounded-md shadow dark-mode:bg-gray-700">

                    @if(auth()->user()->user_type === 'admin')
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    @endif

                    @if(auth()->user()->user_type === 'admin')
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('profile.show') }}">Profile</a>
                    @endif
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">
                            Logout
                        </a>
                    </form>
                </div>
            </div>
        </div>
            {{-- <a  class="mr-5 hover:text-gray-900">{{auth()->user()->name}}</a> --}}
        @endauth
      </nav>
      <a href="{{route('postad')}}" class="inline-flex items-center bg-green-500 border-0 py-1 px-3 focus:outline-none hover:bg-green-200 rounded text-base text-gray-50 font-semibold mt-4 md:mt-0 md:ml-4">
        Post New Ad
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </a>

    </div>
  </header>
