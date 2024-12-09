<x-main-layout>
    <x-slot name="header">
        <x-main-header></x-main-header>
    </x-slot>
    <style>
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        .hidden {
            display: none;
        }
    </style>

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
            <form action="{{ route('postad-store') }}" method="POST" enctype="multipart/form-data" id="form">
                @csrf

                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-2 sm:col-start-1">
                                <label for="country" class="block text-sm font-medium text-gray-900">Country</label>
                                <select id="country" name="country" data-required
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="">Select Country</option>
                                    @foreach (App\Models\Country::all() as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="state" class="block text-sm font-medium text-gray-900">State</label>
                                <select id="state" name="state"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="">Select State</option>
                                </select>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="city" class="block text-sm font-medium text-gray-900">City</label>
                                <select id="city" name="city"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
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
                                <label for="contact_name" class="block text-sm/6 font-medium text-gray-900">Contact
                                    Name</label>
                                <div class="mt-2">
                                    <input type="text" name="contact_name" id="contact_name" data-required
                                        autocomplete="address-level2"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="phone" class="block text-sm/6 font-medium text-gray-900">Phone</label>
                                <div class="mt-2">
                                    <input type="text" name="phone" id="phone" autocomplete="address-level1"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                </div>
                            </div>

                            {{-- <div class="sm:col-span-2">
                <label for="postal-code" class="block text-sm/6 font-medium text-gray-900">Fax</label>
                <div class="mt-2">
                  <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
              </div> --}}

                            <div class="sm:col-span-2">
                                <label for="email" class="block text-sm/6 font-medium text-gray-900">Email
                                    address</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" autocomplete="email"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="address" class="block text-sm/6 font-medium text-gray-900">Address</label>
                                <div class="mt-2">
                                    <input id="address" name="address" type="text" autocomplete="address"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="postal_code" class="block text-sm/6 font-medium text-gray-900">Postal
                                    Code</label>
                                <div class="mt-2">
                                    <input id="postal_code" name="postal_code" type="text" autocomplete="postal_code"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
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
                                <label for="about" class="block text-sm/6 font-medium text-gray-900">Description
                                </label>
                                <div class="mt-2">
                                    <div id="editor"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                    </div>
                                    <input type="hidden" name="description" id="hidden-content">
                                    {{-- <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea> --}}
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="price" class="block text-sm/6 font-medium text-gray-900">Price
                                    (CAD)</label>
                                <div class="mt-2">
                                    <input id="price" name="price" type="text" autocomplete="price"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Upload file</label>
                                <input accept="image/*" name="photos" id="file_input"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                                    aria-describedby="file_input_help" id="file_input" type="file">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-500" id="file_input_help">SVG,
                                    PNG, JPG or GIF (MAX. 800x400px).</p>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="youtube" class="block text-sm/6 font-medium text-gray-900">Youtube
                                    Link</label>
                                <div class="mt-2">
                                    <input type="text" name="youtube" id="youtube" autocomplete="given-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-gray-900/10 pb-12">

                        <div class="mt-10 space-y-10">
                            <fieldset>
                                <label for="price" class="mt-1 text-sm/12 text-gray-600">Position of Ad</label>
                                <div class="mt-6 space-y-6">
                                    <div class="flex items-center gap-x-2">
                                        <input id="push-everything" name="ad_position" value="General Listing"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-everything"
                                            class="block text-sm/6 font-medium text-gray-900">General Listing (90 Days
                                            Free Listing)</label>
                                    </div>
                                    <div class="flex items-center gap-x-2">
                                        <input id="push-email" name="ad_position" value="Special Listing"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-email"
                                            class="block text-sm/6 font-medium text-gray-900">Special Listing</label>
                                    </div>
                                    <div class="flex items-center gap-x-2">
                                        <input id="push-nothing" name="ad_position" value="Featured Listing"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-nothing"
                                            class="block text-sm/6 font-medium text-gray-900">Featured Listing</label>
                                    </div>
                                    <div class="flex items-center gap-x-2">
                                        <input id="push-nothing" name="ad_position" value="Sliding Ads"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-nothing"
                                            class="block text-sm/6 font-medium text-gray-900">Sliding Ads</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <p class="mt-1 text-sm/12 text-gray-600">Price Plan</p>
                                <div class="mt-6 space-y-6">
                                    <div class="flex items-center gap-x-3">
                                        <input id="push-everything" name="price_plan" value="General Listing"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-everything"
                                            class="block text-sm/6 font-medium text-gray-900">General Listing (90 Days
                                            Free Listing) (USD 0) per year</label>
                                    </div>
                                    <div class="flex items-center gap-x-3">
                                        <input id="push-email" name="price_plan" value="Special Listing"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-email"
                                            class="block text-sm/6 font-medium text-gray-900">Special Listing (USD 0)
                                            per year</label>
                                    </div>
                                    <div class="flex items-center gap-x-3">
                                        <input id="push-nothing" name="price_plan" value="Featured Listing"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-nothing"
                                            class="block text-sm/6 font-medium text-gray-900">Featured Listing (USD 0)
                                            per year</label>
                                    </div>
                                    <div class="flex items-center gap-x-3">
                                        <input id="push-nothing" name="price_plan" value="Sliding Ads"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-nothing"
                                            class="block text-sm/6 font-medium text-gray-900">Sliding Ads (USD 0) per
                                            year</label>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="sm:col-span-4">
                                <div class="flex items-start mb-5">
                                    <div class="flex items-center h-5">
                                        <input id="terms" type="checkbox" value=""
                                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                            required />
                                    </div>
                                    <label for="terms"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-500">I agree with
                                        the <a href="#"
                                            class="text-blue-600 hover:underline dark:text-blue-500">terms and
                                            conditions</a></label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                    {{-- <button type="submit" id="preview-button" class="rounded-md bg-yellow-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Preview</button> --}}
                    <button type="button" id="preview-button"
                        class="rounded-md bg-yellow-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Preview</button>
                    {{-- <button type="submit" id="previewButton" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button> --}}
                </div>
            </form>

        </div>
    </div>

    <!-- Preview Modal -->
    <div id="preview-modal"
        class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center overflow-y-auto">
        <div class="bg-white rounded-lg p-6 shadow-lg w-full max-w-4xl">
            <h2 class="text-lg font-bold mb-4 text-center">Preview Details</h2>
            <hr class="my-4 border-t border-gray-300">
            <div id="previewContent" class="space-y-4 max-h-[75vh] overflow-y-auto">
                <p><strong>Country:</strong> <span id="previewCountry"></span></p>
                <p><strong>State:</strong> <span id="previewState"></span></p>
                <p><strong>City:</strong> <span id="previewCity"></span></p>
                <p><strong>Name:</strong> <span id="previewName"></span></p>
                <p><strong>Email:</strong> <span id="previewEmail"></span></p>
                <p><strong>Phone:</strong> <span id="previewPhone"></span></p>
                <p><strong>Address:</strong> <span id="previewAddress"></span></p>
                <p><strong>Postal Code:</strong> <span id="previewPostalCode"></span></p>
                <p><strong>Description:</strong> <span id="previewDescription"></span></p>
                <p><strong>Price:</strong> <span id="previewPrice"></span></p>
                <p><strong>Photo:</strong> <img id="previewPhoto" class="mt-2 max-w-[100px] max-h-[100px]"
                        alt="Uploaded Photo Preview"></p>
                <p><strong>Youtube Link:</strong> <span id="previewYoutubeLink"></span></p>
                <p><strong>Position of Ad:</strong> <span id="previewPlaceOfAd"></span></p>
                <p><strong>Price Plan:</strong> <span id="previewPricePlan"></span></p>
            </div>
            <hr class="my-4 border-t border-gray-300">
            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" id="closeModal"
                    class="px-4 py-2 bg-gray-500 text-white rounded-md">Cancel</button>
                <button type="button" id="submitForm"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md">Submit</button>
            </div>
        </div>
    </div>



    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const previewButton = document.getElementById('preview-button');
                const previewModal = document.getElementById('preview-modal');
                const closeModal = document.getElementById('closeModal'); // Close modal button
                const form = document.getElementById('form');

                // Modal fields
                const previewCountry = document.getElementById('previewCountry');
                const previewState = document.getElementById('previewState');
                const previewCity = document.getElementById('previewCity');
                const previewName = document.getElementById('previewName');
                const previewEmail = document.getElementById('previewEmail');
                const previewPhone = document.getElementById('previewPhone');
                const previewAddress = document.getElementById('previewAddress');
                const previewPostalCode = document.getElementById('previewPostalCode');
                const previewPrice = document.getElementById('previewPrice');
                const previewYoutubeLink = document.getElementById('previewYoutubeLink');
                const previewPlaceOfAd = document.getElementById('previewPlaceOfAd');
                const previewPricePlan = document.getElementById('previewPricePlan');
                const previewDescription = document.getElementById('previewDescription'); // Quill content
                const previewPhoto = document.getElementById('previewPhoto'); // Photo preview
                const fileInput = document.getElementById('file_input'); // File input

                // Initialize Quill Editor
                const quill = new Quill('#editor', {
                    theme: 'snow',
                });

                // Function to display error messages
                function showErrorMessage(element, message) {
                    let errorElement = element.nextElementSibling;
                    if (!errorElement || !errorElement.classList.contains('error-message')) {
                        errorElement = document.createElement('div');
                        errorElement.className = 'error-message';
                        errorElement.style.color = 'red';
                        errorElement.style.fontSize = '12px';
                        element.parentNode.insertBefore(errorElement, element.nextSibling);
                    }
                    errorElement.textContent = message;
                }

                // Function to clear error messages
                function clearErrorMessage(element) {
                    const errorElement = element.nextElementSibling;
                    if (errorElement && errorElement.classList.contains('error-message')) {
                        errorElement.textContent = '';
                    }
                }

                // Function to validate the form
                function validateForm() {
                    let isValid = true;

                    // Clear previous error messages
                    const errorMessages = document.querySelectorAll('.error-message');
                    errorMessages.forEach((error) => error.remove());

                    // Validate required fields
                    const requiredFields = form.querySelectorAll('[data-required]');
                    requiredFields.forEach((field) => {
                        clearErrorMessage(field);

                        if (field.tagName === 'SELECT') {
                            if (!field.value.trim()) {
                                showErrorMessage(field, `Please select a value.`);
                                isValid = false;
                            }
                        } else if (field.type === 'radio' || field.type === 'checkbox') {
                            const name = field.name;
                            const checked = form.querySelector(`input[name="${name}"]:checked`);
                            if (!checked) {
                                showErrorMessage(field.parentNode, `Please select an option.`);
                                isValid = false;
                            }
                        } else if (!field.value.trim()) {
                            showErrorMessage(field, `This field is required.`);
                            isValid = false;
                        }
                    });

                    // Validate Quill Editor
                    const quillText = quill.getText().trim();
                    if (!quillText) {
                        showErrorMessage(document.querySelector('#editor'), `Description is required.`);
                        isValid = false;
                    }


                    // Validate Position of Ad
                    const adPositionChecked = form.querySelector('input[name="ad_position"]:checked');
                    const adPositionField = form.querySelector('input[name="ad_position"]');
                    if (!adPositionChecked) {
                        showErrorMessage(adPositionField.parentNode, `Please select a Position of Ad.`);
                        isValid = false;
                    }

                    // Validate Price Plan
                    const pricePlanChecked = form.querySelector('input[name="price_plan"]:checked');
                    const pricePlanField = form.querySelector('input[name="price_plan"]');
                    if (!pricePlanChecked) {
                        showErrorMessage(pricePlanField.parentNode, `Please select a Price Plan.`);
                        isValid = false;
                    }

                    // Validate Terms and Conditions
                    const termsChecked = document.getElementById('terms').checked;
                    if (!termsChecked) {
                        showErrorMessage(document.getElementById('terms'), `You must agree to the terms and conditions.`);
                        isValid = false;
                    }




                    return isValid;
                }

                // Function to populate modal
                function populateModal() {
                    // Populate form fields
                    const countrySelect = document.getElementById('country');
                    previewCountry.textContent =
                        countrySelect.options[countrySelect.selectedIndex]?.text || 'No Country Selected';

                    const stateSelect = document.getElementById('state');
                    previewState.textContent =
                        stateSelect.options[stateSelect.selectedIndex]?.text || 'No State Selected';

                    const citySelect = document.getElementById('city');
                    previewCity.textContent =
                        citySelect.options[citySelect.selectedIndex]?.text || 'No City Selected';

                    previewName.textContent = document.getElementById('contact_name').value || 'No Name Provided';
                    previewEmail.textContent = document.getElementById('email').value || 'No Email Provided';
                    previewPhone.textContent = document.getElementById('phone').value || 'No Phone Number Provided';
                    previewAddress.textContent = document.getElementById('address').value || 'No Address Provided';
                    previewPostalCode.textContent = document.getElementById('postal_code').value ||
                        'No Postal Code Provided';
                    previewPrice.textContent = document.getElementById('price').value || 'No Price Provided';
                    previewYoutubeLink.textContent = document.getElementById('youtube').value ||
                        'No YouTube Link Provided';

                    const selectedAdPosition = document.querySelector('input[name="ad_position"]:checked');
                    previewPlaceOfAd.textContent = selectedAdPosition ? selectedAdPosition.value : 'No Position Selected';

                    const selectedPricePlan = document.querySelector('input[name="price_plan"]:checked');
                    previewPricePlan.textContent = selectedPricePlan ? selectedPricePlan.value : 'No Price Plan Selected';

                    // Populate Quill Editor content
                    previewDescription.innerHTML = quill.root.innerHTML.trim() || 'No Description Provided';

                    // Populate photo preview
                    const file = fileInput.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = (event) => {
                            previewPhoto.src = event.target.result;
                            previewPhoto.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file);
                    } else {
                        previewPhoto.src = '';
                        previewPhoto.classList.add('hidden');
                    }
                }

                // Event listener for preview button
                previewButton.addEventListener('click', (event) => {
                    event.preventDefault();
                    if (validateForm()) {
                        populateModal();
                        previewModal.classList.remove('hidden');
                    }
                });

                // Close modal logic
                closeModal.addEventListener('click', () => {
                    previewModal.classList.add('hidden');
                });

                // Add event listeners to clear error messages on input
                form.querySelectorAll('[data-required]').forEach((field) => {
                    field.addEventListener('input', () => clearErrorMessage(field));
                });

                // For select boxes
                form.querySelectorAll('select[data-required]').forEach((field) => {
                    field.addEventListener('change', () => clearErrorMessage(field));
                });

                // For Quill Editor (clear error when user types)
                quill.on('text-change', () => {
                    clearErrorMessage(document.querySelector('#editor'));
                });
            });


            $(document).ready(function() {
                $('#country').on('change', function() {
                    var country_id = $(this).val();
                    $('#state').html('<option value="">Select State</option>');
                    $('#city').html('<option value="">Select City</option>');

                    if (country_id) {
                        $.ajax({
                            url: "{{ route('getStates', '') }}/" + country_id,
                            type: 'GET',
                            success: function(states) {
                                $.each(states, function(key, state) {
                                    $('#state').append('<option value="' + state.id + '">' +
                                        state.name + '</option>');
                                });
                            }
                        });
                    }
                });

                $('#state').on('change', function() {
                    var state_id = $(this).val();
                    $('#city').html('<option value="">Select City</option>');

                    if (state_id) {
                        $.ajax({
                            url: "{{ route('getCities', '') }}/" + state_id,
                            type: 'GET',
                            success: function(cities) {
                                $.each(cities, function(key, city) {
                                    $('#city').append('<option value="' + city.id + '">' +
                                        city.name + '</option>');
                                });
                            }
                        });
                    }
                });
            });
        </script>

        <!-- <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script> -->


        <!-- Initialize Quill editor -->
        <script>
            // document.addEventListener('DOMContentLoaded', () => {
            //     const previewButton = document.getElementById('preview-button');
            //     const previewModal = document.getElementById('preview-modal');
            //     const form = document.getElementById('form');

            //     // Modal fields
            //     const previewCountry = document.getElementById('previewCountry');
            //     const previewState = document.getElementById('previewState');
            //     const previewCity = document.getElementById('previewCity');
            //     const previewName = document.getElementById('previewName');
            //     const previewEmail = document.getElementById('previewEmail');
            //     const previewPhone = document.getElementById('previewPhone');
            //     const previewAddress = document.getElementById('previewAddress');
            //     const previewPostalCode = document.getElementById('previewPostalCode');
            //     const previewPrice = document.getElementById('previewPrice');
            //     const previewYoutubeLink = document.getElementById('previewYoutubeLink');
            //     const previewPlaceOfAd = document.getElementById('previewPlaceOfAd');
            //     const previewPricePlan = document.getElementById('previewPricePlan');

            //     // Initialize Quill Editor
            //     const quill = new Quill('#editor', {
            //         theme: 'snow',
            //     });

            //     // Function to display error messages
            //     function showErrorMessage(element, message) {
            //         let errorElement = element.nextElementSibling;
            //         if (!errorElement || !errorElement.classList.contains('error-message')) {
            //             errorElement = document.createElement('div');
            //             errorElement.className = 'error-message';
            //             errorElement.style.color = 'red';
            //             errorElement.style.fontSize = '12px';
            //             element.parentNode.insertBefore(errorElement, element.nextSibling);
            //         }
            //         errorElement.textContent = message;
            //     }

            //     // Function to clear error messages
            //     function clearErrorMessage(element) {
            //         const errorElement = element.nextElementSibling;
            //         if (errorElement && errorElement.classList.contains('error-message')) {
            //             errorElement.textContent = '';
            //         }
            //     }

            //     // Function to validate the form
            //     function validateForm() {
            //         let isValid = true;

            //         // Clear previous error messages
            //         const errorMessages = document.querySelectorAll('.error-message');
            //         errorMessages.forEach((error) => error.remove());

            //         // Validate required fields
            //         const requiredFields = form.querySelectorAll('[data-required]');
            //         requiredFields.forEach((field) => {
            //             clearErrorMessage(field);

            //             if (field.tagName === 'SELECT') {
            //                 // For select boxes
            //                 if (!field.value.trim()) {
            //                     showErrorMessage(field, `Please select a value.`);
            //                     isValid = false;
            //                 }
            //             } else if (field.type === 'radio' || field.type === 'checkbox') {
            //                 // For radio or checkboxes
            //                 const name = field.name;
            //                 const checked = form.querySelector(`input[name="${name}"]:checked`);
            //                 if (!checked) {
            //                     showErrorMessage(field.parentNode, `Please select an option.`);
            //                     isValid = false;
            //                 }
            //             } else if (!field.value.trim()) {
            //                 // For text inputs
            //                 showErrorMessage(field, `This field is required.`);
            //                 isValid = false;
            //             }
            //         });

            //         // Validate Quill Editor
            //         const quillContent = quill.root.innerHTML.trim();
            //         const quillText = quill.getText().trim();
            //         const quillEditor = document.querySelector('#editor');

            //         if (!quillText || quillText === '') {
            //             showErrorMessage(quillEditor, `Description is required.`);
            //             isValid = false;
            //         } else {
            //             clearErrorMessage(quillEditor);
            //         }

            //         return isValid;
            //     }

            //     // Function to populate modal
            //     function populateModal() {
            //         const countrySelect = document.getElementById('country');
            //         previewCountry.textContent =
            //             countrySelect.options[countrySelect.selectedIndex]?.text || 'No Country Selected';

            //         const stateSelect = document.getElementById('state');
            //         previewState.textContent =
            //             stateSelect.options[stateSelect.selectedIndex]?.text || 'No State Selected';

            //         const citySelect = document.getElementById('city');
            //         previewCity.textContent =
            //             citySelect.options[citySelect.selectedIndex]?.text || 'No City Selected';

            //         previewName.textContent = document.getElementById('contact_name').value || 'No Name Provided';
            //         previewEmail.textContent = document.getElementById('email').value || 'No Email Provided';
            //         previewPhone.textContent = document.getElementById('phone').value || 'No Phone Number Provided';
            //         previewAddress.textContent = document.getElementById('address').value || 'No Address Provided';
            //         previewPostalCode.textContent = document.getElementById('postal_code').value || 'No Postal Code Provided';
            //         previewPrice.textContent = document.getElementById('price').value || 'No Price Provided';
            //         previewYoutubeLink.textContent = document.getElementById('youtube').value || 'No YouTube Link Provided';

            //         const selectedPlaceOfAd = document.querySelector('input[name="ad_position"]:checked');
            //         previewPlaceOfAd.textContent = selectedPlaceOfAd ? selectedPlaceOfAd.value : 'No Position Selected';

            //         const selectedPricePlan = document.querySelector('input[name="price_plan"]:checked');
            //         previewPricePlan.textContent = selectedPricePlan ? selectedPricePlan.value : 'No Price Plan Selected';
            //     }

            //     // Event listener for preview button
            //     previewButton.addEventListener('click', (event) => {
            //         event.preventDefault();
            //         if (validateForm()) {
            //             populateModal(); // Populate modal only after validation succeeds
            //             previewModal.classList.remove('hidden'); // Show the modal
            //         }
            //     });

            //     // Add event listeners to clear error messages on input
            //     form.querySelectorAll('[data-required]').forEach((field) => {
            //         field.addEventListener('input', () => clearErrorMessage(field));
            //     });

            //     // For select boxes
            //     form.querySelectorAll('select[data-required]').forEach((field) => {
            //         field.addEventListener('change', () => clearErrorMessage(field));
            //     });

            //     // For Quill Editor (clear error when user types)
            //     quill.on('text-change', () => {
            //         clearErrorMessage(document.querySelector('#editor'));
            //     });
            // });
        </script>
        <script>
            // document.addEventListener('DOMContentLoaded', () => {
            //     const previewButton = document.getElementById('preview-button');
            //     const previewModal = document.getElementById('preview-modal');
            //     const form = document.getElementById('form');

            //     // Modal fields
            //     const previewCountry = document.getElementById('previewCountry');
            //     const previewState = document.getElementById('previewState');
            //     const previewCity = document.getElementById('previewCity');
            //     const previewName = document.getElementById('previewName');
            //     const previewEmail = document.getElementById('previewEmail');
            //     const previewPhone = document.getElementById('previewPhone');
            //     const previewAddress = document.getElementById('previewAddress');
            //     const previewPostalCode = document.getElementById('previewPostalCode');
            //     const previewPrice = document.getElementById('previewPrice');
            //     const previewYoutubeLink = document.getElementById('previewYoutubeLink');
            //     const previewPlaceOfAd = document.getElementById('previewPlaceOfAd');
            //     const previewPricePlan = document.getElementById('previewPricePlan');

            //     // Initialize Quill Editor
            //     const quill = new Quill('#editor', {
            //         theme: 'snow',
            //     });

            //     // Function to display error messages
            //     function showErrorMessage(element, message) {
            //         let errorElement = element.nextElementSibling;
            //         if (!errorElement || !errorElement.classList.contains('error-message')) {
            //             errorElement = document.createElement('div');
            //             errorElement.className = 'error-message';
            //             errorElement.style.color = 'red';
            //             errorElement.style.fontSize = '12px';
            //             element.parentNode.insertBefore(errorElement, element.nextSibling);
            //         }
            //         errorElement.textContent = message;
            //     }

            //     // Function to clear error messages
            //     function clearErrorMessage(element) {
            //         const errorElement = element.nextElementSibling;
            //         if (errorElement && errorElement.classList.contains('error-message')) {
            //             errorElement.textContent = '';
            //         }
            //     }

            //     // Function to validate the form
            //     function validateForm() {
            //         let isValid = true;

            //         // Clear previous error messages
            //         const errorMessages = document.querySelectorAll('.error-message');
            //         errorMessages.forEach((error) => error.remove());

            //         // Validate required fields
            //         const requiredFields = form.querySelectorAll('[data-required]');
            //         requiredFields.forEach((field) => {
            //             clearErrorMessage(field);

            //             if (field.tagName === 'SELECT') {
            //                 // For select boxes
            //                 if (!field.value.trim()) {
            //                     showErrorMessage(field, `Please select a value.`);
            //                     isValid = false;
            //                 }
            //             } else if (field.type === 'radio' || field.type === 'checkbox') {
            //                 // For radio or checkboxes
            //                 const name = field.name;
            //                 const checked = form.querySelector(`input[name="${name}"]:checked`);
            //                 if (!checked) {
            //                     showErrorMessage(field.parentNode, `Please select an option.`);
            //                     isValid = false;
            //                 }
            //             } else if (!field.value.trim()) {
            //                 // For text inputs
            //                 showErrorMessage(field, `This field is required.`);
            //                 isValid = false;
            //             }
            //         });

            //         // Validate Quill Editor
            //         const quillContent = quill.root.innerHTML.trim();
            //         const quillText = quill.getText().trim();
            //         const quillEditor = document.querySelector('#editor');

            //         if (!quillText || quillText === '') {
            //             showErrorMessage(quillEditor, `Description is required.`);
            //             isValid = false;
            //         } else {
            //             clearErrorMessage(quillEditor);
            //         }

            //         return isValid;
            //     }

            //     // Function to populate modal
            //     function populateModal() {
            //         const countrySelect = document.getElementById('country');
            //         previewCountry.textContent =
            //             countrySelect.options[countrySelect.selectedIndex]?.text || 'No Country Selected';

            //         const stateSelect = document.getElementById('state');
            //         previewState.textContent =
            //             stateSelect.options[stateSelect.selectedIndex]?.text || 'No State Selected';

            //         const citySelect = document.getElementById('city');
            //         previewCity.textContent =
            //             citySelect.options[citySelect.selectedIndex]?.text || 'No City Selected';

            //         previewName.textContent = document.getElementById('contact_name').value || 'No Name Provided';
            //         previewEmail.textContent = document.getElementById('email').value || 'No Email Provided';
            //         previewPhone.textContent = document.getElementById('phone').value || 'No Phone Number Provided';
            //         previewAddress.textContent = document.getElementById('address').value || 'No Address Provided';
            //         previewPostalCode.textContent = document.getElementById('postal_code').value || 'No Postal Code Provided';
            //         previewPrice.textContent = document.getElementById('price').value || 'No Price Provided';
            //         previewYoutubeLink.textContent = document.getElementById('youtube').value || 'No YouTube Link Provided';

            //         const selectedPlaceOfAd = document.querySelector('input[name="ad_position"]:checked');
            //         previewPlaceOfAd.textContent = selectedPlaceOfAd ? selectedPlaceOfAd.value : 'No Position Selected';

            //         const selectedPricePlan = document.querySelector('input[name="price_plan"]:checked');
            //         previewPricePlan.textContent = selectedPricePlan ? selectedPricePlan.value : 'No Price Plan Selected';
            //     }

            //     // Event listener for preview button
            //     previewButton.addEventListener('click', (event) => {
            //         event.preventDefault();
            //         if (validateForm()) {
            //             populateModal(); // Populate modal only after validation succeeds
            //             previewModal.classList.remove('hidden'); // Show the modal
            //         }
            //     });

            //     // Add event listeners to clear error messages on input
            //     form.querySelectorAll('[data-required]').forEach((field) => {
            //         field.addEventListener('input', () => clearErrorMessage(field));
            //     });

            //     // For select boxes
            //     form.querySelectorAll('select[data-required]').forEach((field) => {
            //         field.addEventListener('change', () => clearErrorMessage(field));
            //     });

            //     // For Quill Editor (clear error when user types)
            //     quill.on('text-change', () => {
            //         clearErrorMessage(document.querySelector('#editor'));
            //     });
            // });
        </script>
    @endpush
    <x-main-footer></x-main-footer>
</x-main-layout>
