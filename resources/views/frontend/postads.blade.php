
<x-main-layout>
    <x-slot name="header">
        <x-main-header></x-main-header>
    </x-slot>


    <div class="bg-white px-4 py-12 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl">
            <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Post Ads</h1>
            </div>
            <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<form method="POST" action="">
    @csrf

    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-2 sm:col-start-1">
                <label for="country" class="block text-sm font-medium text-gray-900">Country</label>
                <select id="country" name="country" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">Select Country</option>
                    @foreach (App\Models\Country::all() as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="sm:col-span-2">
                <label for="state" class="block text-sm font-medium text-gray-900">State</label>
                <select id="state" name="state" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">Select State</option>
                </select>
            </div>

            <div class="sm:col-span-2">
                <label for="city" class="block text-sm font-medium text-gray-900">City</label>
                <select id="city" name="city" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">Select City</option>
                </select>
            </div>
            {{-- <div class="sm:col-span-4">
                <label for="company_name" class="block text-sm/6 font-medium text-gray-900">Company Name</label>
                <div class="mt-2">
                  <input id="company_name" name="company_name" type="text" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
            </div> --}}

              <div class="sm:col-span-2 sm:col-start-1">
                <label for="city" class="block text-sm/6 font-medium text-gray-900">Contact Name</label>
                <div class="mt-2">
                  <input type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
              </div>

              <div class="sm:col-span-2">
                <label for="region" class="block text-sm/6 font-medium text-gray-900">Phone</label>
                <div class="mt-2">
                  <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
              </div>

              {{-- <div class="sm:col-span-2">
                <label for="postal-code" class="block text-sm/6 font-medium text-gray-900">Fax</label>
                <div class="mt-2">
                  <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
              </div> --}}

              <div class="sm:col-span-2">
                <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                <div class="mt-2">
                  <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="company_name" class="block text-sm/6 font-medium text-gray-900">Address</label>
                <div class="mt-2">
                  <input id="company_name" name="company_name" type="text" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="company_name" class="block text-sm/6 font-medium text-gray-900">Postal Code</label>
                <div class="mt-2">
                  <input id="company_name" name="company_name" type="text" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
              </div>

        {{-- <div class="sm:col-span-4">
                <label for="company_name" class="block text-sm/6 font-medium text-gray-900">Website</label>
                <div class="mt-2">
                  <input id="company_name" name="company_name" type="text" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
              </div> --}}

          {{-- <div class="sm:col-span-3">
            <label for="about" class="block text-sm/6 font-medium text-gray-900">Meta Description</label>
            <div class="mt-2">
              <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
            </div>

          </div>
          <div class="sm:col-span-3">
            <label for="about" class="block text-sm/6 font-medium text-gray-900">Meta Keywords </label>
            <div class="mt-2">
              <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
            </div>
          </div> --}}

          <div class="col-span-full">
            <label for="about" class="block text-sm/6 font-medium text-gray-900">Description </label>
            <div class="mt-2">
                <div id="editor" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
              {{-- <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea> --}}
            </div>
          </div>
          <div class="sm:col-span-3">
            <label for="price" class="block text-sm/6 font-medium text-gray-900">Price (CAD)</label>
            <div class="mt-2">
              <input id="price" name="price" type="text" autocomplete="price" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
            </div>
          </div>

          <div class="sm:col-span-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
            <input accept="image/*" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" aria-describedby="file_input_help" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-500" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
          </div>

          <div class="sm:col-span-4">
            <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Youtube Link</label>
            <div class="mt-2">
              <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
            </div>
          </div>
        </div>
      </div>

   <div class="border-b border-gray-900/10 pb-12">

        <div class="mt-10 space-y-10">
            <fieldset>
                <label for="price" class="mt-1 text-sm/12 text-gray-600">Place of Ad</label>
                <div class="mt-6 space-y-6">
                  <div class="flex items-center gap-x-2">
                    <input id="push-everything" name="push-notifications" type="radio" class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="push-everything" class="block text-sm/6 font-medium text-gray-900">General Listing (90 Days Free Listing)</label>
                  </div>
                  <div class="flex items-center gap-x-2">
                    <input id="push-email" name="push-notifications" type="radio" class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="push-email" class="block text-sm/6 font-medium text-gray-900">Special Listings</label>
                  </div>
                  <div class="flex items-center gap-x-2">
                    <input id="push-nothing" name="push-notifications" type="radio" class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="push-nothing" class="block text-sm/6 font-medium text-gray-900">Featured Listing</label>
                  </div>
                  <div class="flex items-center gap-x-2">
                    <input id="push-nothing" name="push-notifications" type="radio" class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="push-nothing" class="block text-sm/6 font-medium text-gray-900">Sliding Ads</label>
                  </div>
                </div>
              </fieldset>

              <fieldset>
                <p class="mt-1 text-sm/12 text-gray-600">Price Plan</p>
                <div class="mt-6 space-y-6">
                  <div class="flex items-center gap-x-3">
                    <input id="push-everything" name="push-notifications" type="radio" class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="push-everything" class="block text-sm/6 font-medium text-gray-900">General Listing (90 Days Free Listing) (USD 0) per year</label>
                  </div>
                  <div class="flex items-center gap-x-3">
                    <input id="push-email" name="push-notifications" type="radio" class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="push-email" class="block text-sm/6 font-medium text-gray-900">Special Listings (USD 0) per year</label>
                  </div>
                  <div class="flex items-center gap-x-3">
                    <input id="push-nothing" name="push-notifications" type="radio" class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="push-nothing" class="block text-sm/6 font-medium text-gray-900">Featured Listing (USD 0) per year</label>
                  </div>
                  <div class="flex items-center gap-x-3">
                    <input id="push-nothing" name="push-notifications" type="radio" class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="push-nothing" class="block text-sm/6 font-medium text-gray-900">Sliding Ads (USD 0) per year</label>
                  </div>
                </div>
              </fieldset>

              <div class="sm:col-span-4">
                <div class="flex items-start mb-5">
                    <div class="flex items-center h-5">
                      <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                    </div>
                    <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-500">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a></label>
                  </div>
              </div>

        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
      <button type="submit" class="rounded-md bg-yellow-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Preview</button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>

        </div>
    </div>
    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <!-- Initialize Quill editor -->
    <script>
        const quill = new Quill('#editor', {
        theme: 'snow', // The 'snow' theme includes the toolbar by default
        modules: {
            toolbar: [
            [{ header: [1, 2, 3, false] }],           // Header levels
            ['bold', 'italic', 'underline', 'strike'], // Text formatting
            ['blockquote', 'code-block'],             // Block quotes, Code blocks
            [{ list: 'ordered' }, { list: 'bullet' }], // Lists
            [{ script: 'sub' }, { script: 'super' }],  // Subscript/Superscript
            [{ indent: '-1' }, { indent: '+1' }],      // Indent
            [{ direction: 'rtl' }],                   // Text direction
            [{ size: ['small', false, 'large', 'huge'] }], // Font sizes
            [{ color: [] }, { background: [] }],      // Text color, Background color
            [{ font: [] }],                           // Font family
            [{ align: [] }],                          // Text alignment
            ['link', 'image', 'video'],               // Links, Images, Videos
            ['clean']                                 // Remove formatting
            ]
        }
        });

    </script>
    <script>
        $(document).ready(function () {
            $('#country').on('change', function () {
                var country_id = $(this).val();
                $('#state').html('<option value="">Select State</option>');
                $('#city').html('<option value="">Select City</option>');

                if (country_id) {
                    $.ajax({
                        url: "{{ route('getStates', '') }}/" + country_id,
                        type: 'GET',
                        success: function (states) {
                            $.each(states, function (key, state) {
                                $('#state').append('<option value="' + state.id + '">' + state.name + '</option>');
                            });
                        }
                    });
                }
            });

            $('#state').on('change', function () {
                var state_id = $(this).val();
                $('#city').html('<option value="">Select City</option>');

                if (state_id) {
                    $.ajax({
                        url: "{{ route('getCities', '') }}/" + state_id,
                        type: 'GET',
                        success: function (cities) {
                            $.each(cities, function (key, city) {
                                $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>
    @endpush

  <x-main-footer></x-main-footer>
</x-main-layout>
